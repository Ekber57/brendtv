<?php
namespace App\externalAPIs\IpTv;

use App\DTOS\IpTv\UserDTO;
use Exception;

class UserAPi extends BaseNntvAPI {
    public function editUser(UserDTO $userDTO)
    {
        $parametres = [
            "id=" => $userDTO->id,
            "username=" => $userDTO->username,
            "password=" => $userDTO->password,
            "credits=" =>  $userDTO->credits,
            "member_group_id=" => 2,
        ];
        $paramStrings = array_map(function ($key, $value) {
            return $key . urlencode($value);
        }, array_keys($parametres), $parametres);

        $queryString = implode("&", $paramStrings);
        $this->buildUrl();

   $this->baseUrl = $this->baseUrl."edit_user&".$queryString;

        $data =  $this->getData($this->baseUrl);
 
        if($data["status"] == "XUI USER EDIT ERROR") {
            throw new Exception("XUI add user  FAIlED");
        }
        return $data;
    }






    public function addUser(UserDTO $userDTO)
    {
        $parametres = [
            "username=" => $userDTO->username,
            "password=" => $userDTO->password,
            "owner_id=" => $userDTO->ownerId,
            "member_group_id=" =>   $userDTO->groupId,
            "credits=" =>  $userDTO->credits
        ];
        $paramStrings = array_map(function ($key, $value) {
            return $key . urlencode($value);
        }, array_keys($parametres), $parametres);

        $queryString = implode("&", $paramStrings);
        $this->buildUrl();

   $this->baseUrl = $this->baseUrl."create_user&".$queryString;

        $data =  $this->getData($this->baseUrl);
     
        if($data["status"] == "STATUS_EXISTS_USERNAME") {
            throw new Exception("XUI add user  FAIlED");
        }
        return $data;
    }





}



?>