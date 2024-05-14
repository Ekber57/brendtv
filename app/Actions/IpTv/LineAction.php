<?php

namespace App\Actions\IpTv;

use Exception;
use App\Models\User;
use App\DTOS\UserDTO;

use App\DTOS\IpTv\LineDTO;
use App\Services\UserService;
use App\DTOS\IpTv\CashbackDTO;
use App\DTOS\IpTv\UserBindingDTO;
use App\Models\IpTv\ResellerTree;
use App\Services\IpTv\LineService;
use Illuminate\Support\Facades\DB;
use App\externalAPIs\ipTv\LinesAPI;
use Illuminate\Support\Facades\Auth;
use App\Services\IpTv\PackageService;
use Illuminate\Support\Facades\Crypt;
use App\externalAPIs\IpTv\PackagesAPI;
use App\Services\IpTv\CashbackService;
use App\Services\IpTv\UserBindingService;
use App\Http\Requests\IpTv\LineCreateRequest;

class LineAction
{
    protected $userService;
    protected $lineService;
    protected $packageService;
    protected $linesAPI;
    protected $packagesAPI;
    protected $userBindingService;
    protected $packageAction;
    protected $cashbackService;

    public function __construct( 
        CashbackService $cashbackService,
        UserBindingService $userBindingService,
        UserService $userService,
        PackageAction $packageAction,
        PackageService $packageService,
        LineService $lineService, PackagesAPI $packagesAPI, LinesAPI $linesAPI)
    {
        $this->cashbackService = $cashbackService;
        $this->packageAction = $packageAction;
        $this->userService = $userService;
        $this->linesAPI = $linesAPI;
        $this->packagesAPI = $packagesAPI;
        $this->lineService = $lineService;
        $this->packageService = $packageService;
        $this->userBindingService = $userBindingService;

    }
    public function getPackages()
    {
        $customPackages = [];
        $key = env("priceKey");
        // if(Auth::user()->hasPermissionTo("create subreseller")) {
        //     $packages = $this->packageAction->getPackagesForSubreseller();
         
        //     foreach($packages as $package) {
        //         $encodedPrice = Crypt::encryptString($package->officialCredits,$key);
        //         $package->enc_price = $encodedPrice;
        //         $package->bouquets = json_decode($package->bouquets);
        //         array_push($customPackages,$package);
        //      }
        // }
  
 
        if(Auth::user()->hasPermissionTo("create subreseller")) {
            $packages = $this->packagesAPI->getPackages();

        foreach($packages as $package) {
       
        if($package->is_trial == "0") {
            $encodedPrice = Crypt::encryptString($package->official_credits,$key);
            $package->enc_price = $encodedPrice;
            array_push($customPackages,$package);
        }
        }
        }
 
     else {
        $packages = $this->packageService->getPackages(Auth::user());
       
        foreach($packages as $package) {
       
            $encodedPrice = Crypt::encryptString($package->officialCredits);
            $package->enc_price = $encodedPrice;
            $package->bouquets = json_decode($package->bouquets);
            array_push($customPackages,$package);
        }
        }




   
        return $customPackages;
      
    }


    public function addLine(LineCreateRequest $lineCreateRequest)
    {

        


        DB::beginTransaction();
        try {
            $lineDTO = new LineDTO();
            $lineDTO->ownerId = Auth::user()->id;
            $selectedBouquets = [];
            $lineDTO->packageId  = $lineCreateRequest->package_id;
        
            $lineDTO->bouquets = $lineCreateRequest->bouquets_selected;

            
            



            $lineDTO->username = $lineCreateRequest->username;
            $lineDTO->password = $lineCreateRequest->password;
            $lineDTO->package_name = $lineCreateRequest->package_name;
            $userDTO = new UserDTO();
            $userDTO->name = $lineCreateRequest->name;
            $userDTO->username = $lineCreateRequest->username;
            $userDTO->email = $lineCreateRequest->username."@brendtv.mail";
            $userDTO->phone = $lineCreateRequest->phone;
            $userDTO->password = $lineCreateRequest->password;
            $userDTO->balance = 0;
            $lineDTO->bouquets = [];
            foreach($lineCreateRequest->bouquets_selected as $bouquet) {
                $id = explode("|",$bouquet)[0];
                $name = explode("|",$bouquet)[1];
                array_push($lineDTO->bouquets,$id);
                array_push($selectedBouquets,[
                    "id" => $id,
                    "name" => $name
                ]);
            }
            $lineDTO->bouquets  = $selectedBouquets;
            $user = $this->userService->addUser($userDTO);
            $lineDTO->userId = $user->id;
            $this->lineService->addLine($lineDTO);
            $lineDTO->bouquets = $lineCreateRequest->bouquets_selected;




            $lineDTO->ownerId = $this->userBindingService->getRemoteId(Auth::user()->id);
            $remote_id  = $this->linesAPI->createLine($lineDTO)["data"]["id"];

            $userBindingDTO = new UserBindingDTO();
            $userBindingDTO->localId = $user->id;
            $userBindingDTO->remoteId = $remote_id;
            $this->userBindingService->addBinding($userBindingDTO);
            $this->addCashback($lineCreateRequest);
          
            DB::commit();
            $data = ['message' => 'Istifadeci yardildi'];

            // Flash the data to the session
            session()->flash('data', $data);
            return redirect()->route('create_line');
        }
        catch( Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function addCashback(lineCreateRequest $req) {
       if(!Auth::user()->hasPermissionTo("create subreseller")){
        $parent = ResellerTree::where("child","=",Auth::user()->id)->first();
        $parent = User::find($parent->parent);
        $package = $this->packageService->getPackage($req->package_id);
        $amount = $package->official_credits - $package->original_official_credits;
        $cashbackDTO = new CashbackDTO();
        $cashbackDTO->userId = $parent->id;
        $cashbackDTO->amount = $amount;
        $this->cashbackService->giveCashback($cashbackDTO);
        $this->userService->decreaseParentBalance(Auth::user(),$package->official_credits);
        }
    }

    public function getLines(User $user) {
        return $local_lines  = $this->lineService->getLinesForUser($user);
        
    }

}
