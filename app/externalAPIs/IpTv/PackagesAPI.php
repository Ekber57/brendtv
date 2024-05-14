<?php
namespace App\externalAPIs\IpTv;

use GuzzleHttp\Client;

class PackagesAPI extends BaseNntvAPI{
    public function getPackages() {
        $client = new Client();
// http://nntv.eu.org/myapi.php?action=get_online_lines&ids=[6620]
        try {
            $response = $client->request('GET',"nntv.eu.org/myapi.php?action=get_package", []);
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
