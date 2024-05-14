<?php
namespace App\externalAPIs\IpTv;


use GuzzleHttp\Client;



class BaseNntvAPI
{

    protected $baseUrl = "";
    protected function  buildUrl()
    {
        $apiKey = env("nnvtApiKey");
        $accessCode = env("nnTvaccessCode");
        $serverUrl = "nntv.eu.org/";
        // $serverUrl = "https://nntv.eu.org";
        $this->baseUrl = $serverUrl . "/" . $accessCode . "/?" . "api_key=" . $apiKey . "&" . "action=";
    }

    public function getData($action,$start = 0,$limit =  0) {
        $this->buildUrl();
        $client = new Client();
        try {
            $response = $client->request('GET', $this->baseUrl.$action."&limit=".$limit."&start=".$start, []);
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
