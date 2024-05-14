<?php
namespace App\Actions\IpTv;

use App\Services\IpTv\LineService;
use App\Services\IpTv\ResellerService;
use App\Services\IpTv\UserBindingService;
use Illuminate\Support\Facades\Auth;

class OnlineLineAction {
    protected $resellerService;
    protected $lineService;
    protected $userBindingService;
    public function __construct(ResellerService $resellerService, LineService $lineService,UserBindingService $userBindingService)
    {
        $this->userBindingService = $userBindingService;
        $this->resellerService = $resellerService;
        $this->lineService = $lineService;
    }
    public function findLinesForReseller() {
        $owners = $this->resellerService->getSubresellers(Auth::user())->toArray();
        array_push($owners,Auth::user()->id);
        print_r($owners);

        $lines = $this->lineService->getLinesForOnlain($owners);
        $remoteLineIds = [];
        foreach($lines as $line) {
            array_push($remoteLineIds,$this->userBindingService->getRemoteId($line->user_id));
        }
        print_r($remoteLineIds);
        $remoteLineIds = [];
        
    }
}




?>