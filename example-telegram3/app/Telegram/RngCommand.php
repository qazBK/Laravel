<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class RngCommand extends CommandHandler
{
    protected static $aliases = [ '/rng', '/rnd' ];
    protected static $description = 'Send "/rng" or "/rnd" to random';

    public function handle()
    {
        
        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        $rnd=rand(1,100);

        \App\Telegram\DataTelegramController::set_data($chatId,'rnd',(int)$rnd);

        AskRngNumberHandler::requestInput($this->bot, $userId);

        return $this->sendMessage([
                'text' => 'Угадай загадано число от 1 до 100, Напишите число:',
            ]);
    }
}
