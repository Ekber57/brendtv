<?php
namespace App\Actions\IpTv;

use Exception;
use App\Models\User;
use App\DTOS\IpTv\UserDTO;
use App\externalAPIs\IpTv\UserAPi;
use Illuminate\Support\Facades\DB;
use App\externalAPIs\ipTv\GroupsAPI;
use App\externalAPIs\IpTv\PackagesAPI;
use App\Services\IpTv\PackageService;
use App\Services\IpTv\ResellerService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResellerEditActions {
    
    protected $groupsAPI;
    protected $userAPi;
    protected $packagesAPI;
    protected $resellerAction;
    protected $packageAction;
    protected $resellerService;
    protected $packageService;
    public function __construct(GroupsAPI $groupsAPI,UserAPi $userAPi, PackagesAPI $packagesAPI , ResellerAction $resellerAction,PackageAction $packageAction,ResellerService $resellerService,PackageService $packageService)
    {
        $this->packagesAPI = $packagesAPI;
        $this->packageService = $packageService;
        $this->resellerService = $resellerService;
        $this->packageAction = $packageAction;
        $this->resellerAction = $resellerAction;
        $this->groupsAPI = $groupsAPI;
        $this->userAPi = $userAPi;
    }

    public function editReseller($user) {
        return view("edit_reseller",["user" => $user, "groups" => $this->groupsAPI->getGroups()]);
    }

    public function editSubreseller($user) {
        return view("edit_subreseller",["user" => $user, "packages" => $this->packageAction->filterTrialPackages( $this->packagesAPI->getPackages()), "custom_packages" => $this->packageService->getPackages($user)]);
    }
    

    public function storeReseller() {
        
        DB::beginTransaction();
        try {

            $userDTO = new UserDTO();
            $userDTO->username = request()->username;
            $userDTO->password = request()->password;
            $userDTO->credits = request()->balance;
            $userDTO->id = request()->user_id;
            $this->userAPi->editUser($userDTO);
            $user = User::find(request()->user_id);

            $group =  $this->resellerService->getResellerGroup($user);
            if(!empty(request()->group_id)) {
                if(request()->group_id !=  $group) {
                    $this->resellerAction->editGroup($user);
                    $this->packageAction->resetAllDepenentResellerPackages($user);
                }
            }

            $this->packageAction->resetAllDepenentResellerPackages($user);
            $user->email = request()->mail;
            $user->email = request()->mail;
            $user->username  = request()->username;
            $user->name = request()->name;
            if(!empty(request()->password)) {
                $user->password = Hash::make(request()->password);
            }
            if (Auth::user()->hasPermissionTo("create reseller")) {
                $user->balance = request()->balance;
            }
            $user->save();
       
   
            Db::commit();
        } catch (Exception $e) {
            DB::rollback();
            //throw $th;
            throw $e;
        }

        return redirect()->away(request()->getSchemeAndHttpHost() . "/reseller/edit/" . request()->user_id)->with('data', "melumatlar yenilendi");
    }
    

    public function storeSubreseller() {
                
        DB::beginTransaction();
        try {

            $userDTO = new UserDTO();
            $userDTO->username = request()->username;
            $userDTO->password = request()->password;
            $userDTO->credits = request()->balance;
            $userDTO->id = request()->user_id;
            $this->userAPi->editUser($userDTO);
            $user = User::find(request()->user_id);
            $this->packageService->clear($user);
            $this->resellerService->clearPackage($user);
            $this->packageAction->createPackageForUser(request(),$user);
            $user->email = request()->mail;
            $user->username  = request()->username;
            $user->name = request()->name;
            if(!empty(request()->password)) {
                $user->password = Hash::make(request()->password);
            }
            if (Auth::user()->hasPermissionTo("create reseller")) {
                $user->balance = request()->balance;
            }
            $user->save();
       
   
            Db::commit();
        } catch (Exception $e) {
            DB::rollback();
            //throw $th;
            throw $e;
        }

        return redirect()->away(request()->getSchemeAndHttpHost() . "/subreseller/edit/" . request()->user_id)->with('data', "melumatlar yenilendi");
    }

}



















?>