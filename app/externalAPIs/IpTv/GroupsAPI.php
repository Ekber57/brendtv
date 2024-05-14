<?php
namespace App\externalAPIs\ipTv;

use Exception;
use Illuminate\Support\Facades\Log;

class GroupsAPI extends BaseNntvAPI{
    public function getGroups() {
       $data = $this->getData("get_groups",0,1000000);
       return $data;
    }
}





?>
