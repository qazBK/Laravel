<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Validator;
use WeStacks\TeleBot\Handlers\RequestInputHandler;

class AskSumN2Handler extends RequestInputHandler
{
    public function handle()
    {
        $data = $this->update->message()->text;

        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        $this->acceptInput();

        $n1=\App\Telegram\DataTelegramController::get_data($chatId,'n1',0);
        
        return $this->sendMessage([
            'text' => 'Сложение двух чисел:'.((int)$data+$n1),
        ]);

    }
}