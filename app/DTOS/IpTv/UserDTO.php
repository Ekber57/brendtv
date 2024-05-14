<?php
namespace App\DTOS\IpTv;

use App\enums\iptv\UserType;

class UserDTO {
    public $id;
    public $username;
    public $password;
    public $groupId;
    public $ownerId;
    public $credits;
}

?>