<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class SendCommand extends CommandHandler
{
    protected static $aliases = [ '/send' ];
    protected static $description = 'Send "/send" to send message All';

    public function handle()
    {
        
        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        AskSendMessageHandler::requestInput($this->bot, $userId);

        return $this->sendMessage([
                'text' => 'Введите сообщение для рассылки:',
            ]);
    }
}