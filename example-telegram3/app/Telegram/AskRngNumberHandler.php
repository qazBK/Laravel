<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Validator;
use WeStacks\TeleBot\Handlers\RequestInputHandler;

class AskRngNumberHandler extends RequestInputHandler
{
    public function handle()
    {
        $data = $this->update->message()->text;

        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        $this->acceptInput();

        $n = (int)$data;
        $rnd=\App\Telegram\DataTelegramController::get_data($chatId,'rnd',0);

        if ($rnd>$n) {
            AskRngNumberHandler::requestInput($this->bot, $userId);
            return $this->sendMessage([
                'text' => 'Загаданное число Больше ',
            ]);
        }

        if ($rnd<$n) {
            AskRngNumberHandler::requestInput($this->bot, $userId);
            return $this->sendMessage([
                'text' => 'Загаданное число Меньше ',
            ]);
        }
        
        return $this->sendMessage([
            'text' => 'Вы угадали, загаданное число :'.$rnd,
        ]);

    }
}