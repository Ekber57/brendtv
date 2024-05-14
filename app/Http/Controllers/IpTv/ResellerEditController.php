<?php
namespace App\Http\Controllers\IpTv;

use App\Actions\IpTv\ResellerEditActions;
use App\Http\Controllers\Controller;
use App\Models\User;

class ResellerEditController extends Controller{

    public function editReseller(ResellerEditActions $resellerEditActions,User $user) {
        return $resellerEditActions->editReseller($user);
    }
    public function storeReseller(ResellerEditActions $resellerEditActions) {
        return $resellerEditActions->storeReseller();
    }
    public function editSubreseller(ResellerEditActions $resellerEditActions,User $user) {
        return $resellerEditActions->editSubreseller($user);
    }
    public function storeSubreseller(ResellerEditActions $resellerEditActions) {
        return $resellerEditActions->storeSubreseller();
    }


}





?>