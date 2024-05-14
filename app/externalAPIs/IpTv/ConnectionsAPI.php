<?php
namespace App\externalAPIs\IpTv;


use GuzzleHttp\Client;
use App\externalAPIs\IpTv\BaseNntvAPI;


class ConnectionsAPI extends BaseNntvAPI{
 
    public function getConnections() {
        $this->buildUrl();
        $this->baseUrl = $this->baseUrl."live_connections";
        $client = new Client();

        try {
            $response = $client->request('GET', $this->baseUrl, []);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
               $data = json_decode($response->getBody()->getContents(), true);
                
                // Process the data as needed
                return $data;
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





?>