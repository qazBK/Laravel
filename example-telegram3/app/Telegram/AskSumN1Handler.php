<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Validator;
use WeStacks\TeleBot\Handlers\RequestInputHandler;

class AskSumN1Handler extends RequestInputHandler
{
    public function handle()
    {
        $data = $this->update->message()->text;

        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        $this->acceptInput();

        \App\Telegram\DataTelegramController::set_data($chatId,'n1',(int)$data);

        AskSumN2Handler::requestInput($this->bot, $userId);
        
        return $this->sendMessage([
            'text' => 'Введите второе число:',
        ]);

    }
}