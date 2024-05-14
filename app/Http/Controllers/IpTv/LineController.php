<?php

namespace App\Http\Controllers\IpTv;

use App\Models\IpTv\Bouquet;
use App\Actions\DashboardAction;
use App\Actions\IpTv\LineAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\IpTv\LineCreateRequest;
use Illuminate\Support\Facades\Auth;

class LineController extends Controller
{
    public function show(LineAction  $lineAction)
    {
        
        return view("lines", [
            "lines" => $lineAction->getLines(Auth::user()),
        ]);
    }
    public function create(LineAction $lineAction)
    {

        return view("createline", [
            "packages" => $lineAction->getPackages(),
        ]);
    }
    public function store(LineAction $lineAction, LineCreateRequest $lineCreateRequest)
    {

        // print_r($lineCreateRequest->bouquets_selected);
        return $lineAction->addLine($lineCreateRequest);
    }
}
