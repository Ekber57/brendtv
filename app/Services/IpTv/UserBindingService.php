<?php
namespace App\Services\IpTv;

use App\DTOS\IpTv\UserBindingDTO;
use App\Models\IpTv\UserBinding;

class UserBindingService {
    public function addBinding(UserBindingDTO $userBindingDTO) {
        return UserBinding::create([
            'remote_id' => $userBindingDTO->remoteId,
            'local_id' => $userBindingDTO->localId,
         ]);
        }

    public function getRemoteId($localId) {
        return UserBinding::where("local_id","=",$localId)->first()->remote_id;
    }
}





?>