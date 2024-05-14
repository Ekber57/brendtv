<?php
namespace App\Services\IpTv;
use App\Models\User;
use App\DTOS\IpTv\PackageDTO;
use App\Models\IpTv\Reseller;
use App\DTOS\IpTv\ResellerDTO;
use App\Models\IpTv\ResellerTree;
use App\Models\IpTv\ResellerPackage;

class ResellerService {
    public function addReseller(ResellerDTO $resellerDTO)  {
     return   Reseller::create([
            'user_id' => $resellerDTO->child,
            'group_id' => $resellerDTO->groupId
        ]);
    }
    public function addSubreseller(ResellerDTO $resellerDTO)  {
     return   ResellerTree::create([
            'parent' => $resellerDTO->parent,
            'child' => $resellerDTO->child
        ]);
    }





    public function getResellers() {
        return Reseller::all();
    }
    public function getSubresellers(User $user) {
        return ResellerTree::where("parent","=",$user->id)->pluck("child");
    }


    public function getResellerPackages(User $user) {
        $packages = [];
        foreach(ResellerPackage::where("user_id","=",$user->id)->get() as $package) {
            $packageDTO = new PackageDTO();
            $packageDTO->package_name = $package->package_name;
            $packageDTO->officialCredits = $package->official_credits;
            $packageDTO->id = $package->id;
            $packageDTO->original_package_id = $package->original_package_id;
            $packageDTO->userId = $package->user_id;
            $packageDTO->originalOfficialCredits = $package->original_official_credits;
            $packageDTO->bouquets = json_decode($package->bouquets);
            
            array_push($packages,$packageDTO);
        }
        return $packages;
    }    

    public function addPackage(PackageDTO $packageDTO) {
       
        return ResellerPackage::create([
            "official_credits" => $packageDTO->officialCredits,
            "user_id" => $packageDTO->userId,
            'original_package_id' =>$packageDTO->original_package_id,
            'package_name' => $packageDTO->package_name,
            'original_official_credits' => $packageDTO->originalOfficialCredits,
            "bouquets" => $packageDTO->bouquets,
        
        ]);
    }
    public function clearPackage(User $user) {
        ResellerPackage::where("user_id","=",$user->id)->delete();
    }

    public function getResellerGroup(User $user) {
        return Reseller::where("user_id","=",$user->id)->first()->group_id;
    }

    public function editGroup(User $user,int $group) {
        $reseller = Reseller::where("user_id","=",$user->id)->first();
        $reseller->group_id = $group;
        $reseller->save();
    }

    public function getGroupId(User $user) {
        return Reseller::where("user_id","=",$user->id)->first()->group_id;
    }













    

}




?>