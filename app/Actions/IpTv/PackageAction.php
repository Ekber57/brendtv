<?php

namespace App\Actions\IpTv;

use App\Models\User;
use App\DTOS\IpTv\PackageDTO;
use Illuminate\Support\Facades\Auth;
use App\Services\IpTv\PackageService;
use App\externalAPIs\IpTv\PackagesAPI;
use App\Models\IpTv\ResellerTree;
use App\Services\IpTv\ResellerService;

class PackageAction
{
    protected $packagesAPI;
    protected $packageService;
    protected $resellerService;
    public function __construct(ResellerService $resellerService,  PackagesAPI $packagesAPI,PackageService $packageService)
    {
        $this->resellerService = $resellerService;
        $this->packageService = $packageService;
        $this->packagesAPI = $packagesAPI;
    }
    public function showPackages()
    {
       

        if (Auth::user()->hasPermissionTo("create subreseller")) {
        $packages = $this->packagesAPI->getPackages();
        return  view("packages", [
            "packages" => array_filter($this->filterTrialPackages($this->packagesAPI->getPackages()),array($this,"trimPackgeName")),
            "custom_packages" =>$this->packageService->getPackages(Auth::user())
        
        ]); 
        }



        else {
       
            return  view("packages", [
                "packages" => array_filter($this->packageService->getPackages(Auth::user()),array($this,"trimPackgeName")),
                "custom_packages" =>$this->resellerService->getResellerPackages(Auth::user())
            
            ]); ;
        }
    }


    public function getPackagesForSubreseller() {
        $parent = ResellerTree::where("child","=",Auth::user()->id)->first();
        $parent = User::find($parent->parent);
        $packages = $this->packageService->getPackages($parent);
        return $packages;
    }

    public function getResellerPackages(User $user) {
        $packages = [];
        // if($user->hasPermissionTo("create reseller")) {
            foreach ($this->packagesAPI->getPackages() as $package) {
                if($package->is_trial == "0") {
                    array_push($packages,$package);
                }
            }
            return array_filter($packages,array($this,"trimPackgeName"));
    }


    public function resetAllDepenentResellerPackages($user) {

        $subresellers = $this->resellerService->getSubresellers($user);

        $this->packageService->clear($user);
        foreach($subresellers as $id) {
            $user = User::find($id);
            $this->packageService->clear($user);
            $this->resellerService->clearPackage($user);
        }
    }






























    public function createCustomPackage($request,$user = null) {
        if($user == null) $user = Auth::user();            
        $packages = [];
       $this->resellerService->clearPackage($user);
        for($i = 0; $i <  count($request->package_name);$i++) {
            $packageDTO = new PackageDTO();
            $packageDTO->userId = $user->id;
            $packageDTO->officialDuration = $request->official_duration[$i];
            $packageDTO->package_name = $this->createPackageName($request->package_name[$i],$request->offical_credits[$i]);
            $packageDTO->bouquets = json_encode( $request->bouquets[$i]);
            $packageDTO->officialCredits = $request->offical_credits[$i];
            $packageDTO->originalOfficialCredits = $request->original_official_credits[$i];
            $packageDTO->original_package_id = $request->original_package_id[$i];
            $this->resellerService->addPackage($packageDTO);
            array_push($packages,$packageDTO);
        }
        return $packages;
    }

    public function createPackageForUser($request,$user = null) {
        if($user == null) $user = Auth::user();            
        $packages = [];
        $this->packageService->clear($user);
        for($i = 0; $i <  count($request->package_name);$i++) {
            $packageDTO = new PackageDTO();
            $packageDTO->officialDuration = $request->official_duration[$i];
            $packageDTO->userId = $user->id;
            $pkcName = $this->trimPackgeNameOnString($request->package_name[$i]);
            $packageDTO->package_name = $this->createPackageName($pkcName,$request->offical_credits[$i]);
            $packageDTO->bouquets = json_encode( $request->bouquets[$i]);
            $packageDTO->officialCredits = $request->offical_credits[$i];
            $packageDTO->originalOfficialCredits = $request->original_official_credits[$i];
            $packageDTO->original_package_id = $request->original_package_id[$i];
            $this->packageService->addPackage($packageDTO);
            array_push($packages,$packageDTO);
        }
        return $packages;
    }





















    private function createPackageName($name, $price)
    {
        return $name." (".$price." KREDIT)";
    }


    private function trimPackgeNameOnString($package)
    {   
            $customName = $package;

            $pattern = "/\(\d+ KREDIT\)/";
            $pattern2 = "/\(\d+ kredit\)/";
            $pattern3 = "/\(\d+ kredi\)/";
            $customName = preg_replace($pattern, '', $customName);
            $customName = preg_replace($pattern2, '', $customName);
            $customName = preg_replace($pattern3, '', $customName);
            return $customName;
    }
    private function trimPackgeName($package)
    {   
            $customName = $package->package_name;

            $pattern = "/\(\d+ KREDIT\)/";
            $pattern2 = "/\(\d+ kredit\)/";
            $pattern3 = "/\(\d+ kredi\)/";
            $customName = preg_replace($pattern, '', $customName);
            $customName = preg_replace($pattern2, '', $customName);
            $customName = preg_replace($pattern3, '', $customName);
            $package->package_name = $customName;
            return $package;
    }

    public  function filterTrialPackages($packages) {
        $filteredPackages = [];
        foreach($packages as  $package) {
            if($package->is_trial == "0") {
                array_push($filteredPackages,$package);
            }
        }

        return $filteredPackages;
    }
}
