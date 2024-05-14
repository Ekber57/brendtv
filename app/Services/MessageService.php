<?php
namespace App\Services;

use App\DTOS\MessageDTO;
use App\Models\Message;

class MessageService {
    public function addMessage(MessageDTO $messageDTO) {
        return Message::create([
            'to' => $messageDTO->to,
            'header' => $messageDTO->header,
            'body' => $messageDTO->body,
            'status' => 0
        ]);
    }
}





?>