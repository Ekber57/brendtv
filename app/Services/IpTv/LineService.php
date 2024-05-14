<?php
namespace App\Services\IpTv;
use App\Models\User;
use App\Models\IpTV\Line;
use App\DTOS\IpTv\LineDTO;


class LineService {
    public function addLine(LineDTO $nntvLineDTO) {
        Line::create([
            "user_id" => $nntvLineDTO->userId,
            "owner_id" => $nntvLineDTO->ownerId,
            "package_id" => $nntvLineDTO->packageId,
            "password" => $nntvLineDTO->password,
            "username" => $nntvLineDTO->username,
            "bouquets" => json_encode($nntvLineDTO->bouquets),
            "package_name" => $nntvLineDTO->package_name,
            "status" => 0
        ]);
    }

    public function getLinesForUser(User $user) {
        return User::join("lines","lines.owner_id","=","users.id")->select(["users.username as owner","users.id as uid","lines.*"])->get();
    }

    public function createEmptyLine(User $user) {
        Line::create([
            "user_id" => $user->id,
            "owner_id" => 1,
            "package_id" => 0,
            "password" => '',
            "username" => $user->username,
            "bouquets" => json_encode([]),
            "package_name" => '',
            "status" => 0
        ]);


    }
    
    // public function getOwner(User $user,) {
    //     return Line::where("")
    // }


    public function getLinesForOnlain(array $ids) {
        return Line::whereIn("owner_id",$ids)->get();
    }

}



?>