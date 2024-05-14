<?php
namespace App\externalAPIs\IpTv;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Services\IpTv\ResellerService;

class PackagesAPI extends BaseNntvAPI{
    protected $resellerService;
    public function __construct(ResellerService $resellerService)
    {
        $this->resellerService = $resellerService;
    }
    public function getPackages() {
        $groupId = $this->resellerService->getGroupId(Auth::user());
        $client = new Client();
// http://nntv.eu.org/myapi.php?action=get_online_lines&ids=[6620]
        try {
            $response = $client->request('GET',"nntv.eu.org/myapi.php?action=get_package&member_id=".$groupId, []);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
               $data = json_decode($response->getBody()->getContents(), false);
                return $data->data;
            } else {
                
                // Handle error
                return response()->json(['error' => 'Failed to fetch data'], $statusCode);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
