<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class SumCommand extends CommandHandler
{
    protected static $aliases = [ '/sum', '/summa' ];
    protected static $description = 'Send "/sum" or "/summa" to sum two numbers';

    public function handle()
    {
        
        $userId = $this->update->user()->id;
        //$chatId = $this->update->chat()->id;

        AskSumN1Handler::requestInput($this->bot, $userId);

        return $this->sendMessage([
                'text' => 'Для сложений чисел введите первое число:',
            ]);
    }
}