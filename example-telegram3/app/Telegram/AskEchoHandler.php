<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Validator;
use WeStacks\TeleBot\Handlers\RequestInputHandler;

class AskEchoHandler extends RequestInputHandler
{
    public function handle()
    {
        $data = $this->update->message()->text;

        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        $this->acceptInput();

        AskEchoHandler::requestInput($this->bot, $userId);
 
        return $this->sendMessage([
            'text' => $data,
        ]);

    }
}