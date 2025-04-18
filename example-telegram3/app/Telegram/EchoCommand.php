<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class EchoCommand extends CommandHandler
{
    protected static $aliases = [ '/echo' ];
    protected static $description = 'Send "/echo" ';

    public function handle()
    {
        
        $userId = $this->update->user()->id;
        //$chatId = $this->update->chat()->id;

        AskEchoHandler::requestInput($this->bot, $userId);

        return $this->sendMessage([
                'text' => 'Введите сообщение для цитирования:',
            ]);
    }
}