<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class HelpCommand extends CommandHandler
{
    protected static $aliases = [ '/help', '/h' ];
    protected static $description = 'Send "/help" or "/h" to get "Help!"';

    public function handle()
    {
     
        return  $this->sendMessage([
                'text' => 'Команда Help. Проверка...',
            ]);

    }
}