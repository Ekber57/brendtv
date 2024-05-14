<?php
namespace App\Actions\Auth\iptv;

use App\Models\User;
use App\Services\IpTv\LineService;

trait LineRegisterTRAIT {
    public function addToLines(User $user) {
        $lineService = new LineService();
        $lineService->createEmptyLine($user);
    }
}




?>