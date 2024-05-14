<?php
namespace App\Actions;

use App\Actions\DashboardTraits\IpTv\LineTrait;
use App\externalAPIs\IpTv\BaseNntvAPI;

class DashboardAction
{
    use LineTrait;
    protected $api;
    public function __construct()
    {
        $this->api = new BaseNntvAPI();
    }
    public function index()
    {
        return $this->lineIndex();
    }


































    // public function show()
    // {
    //     $api = new BaseNntvAPI();
     
    //     $streams = new StreamsAPI();
    //     return view('dashboard',[
    //         "lines" => $this->getLines(),
    //         "streams" => count($api->getData("get_streams",1,1000000)["data"]),
    //         "connections_count" =>count($api->getData("live_connections",1,1000000)["data"])
    //         // 'packages' => $api->getPackages()
        
        
    //     ]);
    // }

    // public function getLines()  {
    //     $lines = $this->api->getData("get_lines",1,1000000000000)["data"];
    //     $lines = collect($lines)->filter(function($line){
    //          if($line["owner_name"] == "ekber005") return $line;
    //     });
    //     return $lines;
    // }
}
