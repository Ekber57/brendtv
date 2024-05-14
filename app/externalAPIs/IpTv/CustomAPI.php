<?php
namespace App\externalAPIs\IpTv;

use GuzzleHttp\Client;

class CustomAPI {
    public function getOnlineLines(array $ids) {
        // $this->buildUrl();
        $client = new Client();
        $ids = json_encode($ids);
        try {
            $response = $client->request('GET', "http://nntv.eu.org/myapi.php?action=get_online_lines&ids=".$ids, []);
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