<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class StartCommand extends CommandHandler
{
    protected static $aliases = [ '/start', '/s' ];
    protected static $description = 'Send "/start" or "/s" to get "Hello, World!"';

    public function handle()
    {
        
        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        $username=$this->update->chat()->username;
        \App\Telegram\DataTelegramController::set_telegram_user($chatId,$username);


        $isUserAlreadyRegistered = false; //BotService::checkIfUserAlreadyRegistered($userId);

        if ($isUserAlreadyRegistered) {
            $this->sendMessage([
                'chat_id' => $chatId,
                'text' => 'Вы уже регистрировались в системе! '.$chatId,
            ]);
        } else {


            return $this->sendMessage([
//                'chat_id' => $chatId,
                'text' => 'Привет твой id=.'.$chatId,
                //TaxiReplyKeyboard::requestPhoneNumber()
            ]);
        }        

//          return $this->sendMessage(['text' => 'Hello, World!']);

    }
}
