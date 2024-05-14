<?php
namespace App\externalAPIs\ipTv;


use App\DTOS\IpTv\LineDTO;
use App\Exceptions\IpTv\API\LineException;
use App\Models\User;

class LinesAPI extends BaseNntvAPI
{
    public function createLine(LineDTO $nntvLineDTO)
    {
        $parametres = [
            "username=" => $nntvLineDTO->username,
            "password=" => $nntvLineDTO->password,
            "member_id=" => $nntvLineDTO->ownerId,
            "package_id=" => $nntvLineDTO->packageId,
            "bouquets_selected=" => json_encode($nntvLineDTO->bouquets),
            "exp_date="=> $nntvLineDTO->expDate
        ];
        $paramStrings = array_map(function ($key, $value) {
            return $key . urlencode($value);
        }, array_keys($parametres), $parametres);

        $queryString = implode("&", $paramStrings);
        $this->buildUrl();
      $parametres["bouquets_selected="];
     $this->baseUrl = $this->baseUrl."create_line&".$queryString;
        $data =  $this->getData($this->baseUrl);
     
        if($data["status"] == "STATUS_FAILURE") {
            throw new LineException("XUI SYSTEM FAIlED");
        }
        return $data;
    }

    public function getLines($id) {
        $url = $this->buildUrl()."get_lines";
        $data = $this->getData($url);
    }




}
