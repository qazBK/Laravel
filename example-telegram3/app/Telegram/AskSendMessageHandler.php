<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Validator;
use WeStacks\TeleBot\Handlers\RequestInputHandler;

class AskSendMessageHandler extends RequestInputHandler
{
    public function handle()
    {
        $data = $this->update->message()->text;
        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;
        $this->acceptInput();


        $list = \App\Models\TelegramChat::all();

        
        foreach($list as $chat)
        {
            \App\Jobs\ProcessSendMessage::dispatch(chatId:$chat->chat_id,message:$data); 
        }
        return $this->sendMessage([
            'text' => 'Запущена рассылка:',
        ]);

    }
}