<?php
namespace App\Http\Controllers\IpTv;
use Illuminate\Http\Request;
use App\Actions\IpTv\ResellerAction;
use App\Actions\IpTv\PackageAction;
use App\externalAPIs\ipTv\GroupsAPI;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\IpTv\ResellerService;
use App\Http\Requests\IpTv\ResellerCreateRequest;
use App\Http\Requests\IpTv\SubresellerCreateRequest;
use App\Models\IpTv\Package;

class ResellerController extends Controller {
    public function createSubreseller(PackageAction $packageAction,ResellerService $resellerService) {
        return view("create_subreseller",["packages" => $packageAction->getResellerPackages(Auth::user())]);
    }
    public function createReseller(ResellerAction $resellerAction,ResellerService $resellerService,GroupsAPI $groupsAPI) {
        return view("create_reseller",["groups" => $groupsAPI->getGroups()]);
    }


    public function getResellers(ResellerAction $resellerAction) {
        $this->authorize("create reseller");

        return view("resellers",[
            "users" => $resellerAction->getResellers()
        ]);
    }

    public function getSubresellers(ResellerAction $resellerAction) {
        $this->authorize("create subreseller");
        return view("subresellers",[
            "users" => $resellerAction->getSubresellers()
        ]);
    }









    public function storeReseller(ResellerAction $resellerAction, ResellerCreateRequest $resellerCreateRequest) 
    {
        $this->authorize("create reseller");
        return $resellerAction->addReseller($resellerCreateRequest);
    }
    public function storeSubreseller(ResellerAction $resellerAction, SubresellerCreateRequest $subresellerCreateRequest) 
    {
        $this->authorize("create subreseller");
        return $resellerAction->addSubreseller($subresellerCreateRequest);
    }

    public function showPackages(PackageAction $packageAction) {
        return $packageAction->showPackages();
    }


    public function editPackages(Request $request,PackageAction $packageAction) {
        if(Auth::user()->hasPermissionTo("create subreseller")) {
            return $packageAction->createPackageForUser($request);
        }
        else {
            return $packageAction->createCustomPackage($request);
        }
       
    }
}


?> 