<?php
namespace App\Exceptions\IpTv\API;

use Exception;

class LineException extends Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

?>
