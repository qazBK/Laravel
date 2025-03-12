<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class BotUpdateHandler extends UpdateHandler
{
    public function trigger(): bool
    {
        //Когда нужно обрабатывать...
        return isset($this->update->message); // handle regular messages (example)
    }

    public function handle()
    {
        $update = $this->update;
        $bot = $this->bot;

        // chat_id => $this->update->message->chat->id
        $data = $this->update->message()->text;
        
        return $this->sendMessage([
            'text' => 'Вы написали: ' . $data,
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        ['text' => 'Google',
                        'url' => 'https://www.google.com/search?q='. $data
                        ],
                        ['text' => 'Удалить 6',
                        'callback_data' => 'test:delete:6'
                        ],
                    ]
                    ]
                ]   

        ]); 
    }
}