<?php
namespace App\Services\IpTv;

use App\DTOS\IpTv\CashbackDTO;
use App\Models\User;
use App\Models\IpTv\Cashback;

class CashbackService {
    public function createPurse(User $user) {
        return Cashback::create([
            'user_id' => $user->id,
            'amount' => 0
        ]);
    }

    public function giveCashback(CashbackDTO $cashbackDTO) {
        $cashback = Cashback::where("user_id","=",$cashbackDTO->userId)->first();
        $cashback->amount = $cashback->amount + $cashbackDTO->amount;
        $cashback->save();
    }
}



?>