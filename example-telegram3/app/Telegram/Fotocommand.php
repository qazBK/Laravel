<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class FotoCommand extends CommandHandler
{
    protected static $aliases = [ '/foto' ];
    protected static $description = 'Send "/help" or "/h" to get "Help!"';

    public function handle(){
    $userId = $this->update->user()->id;
    //$chatId = $this->update->chat()->id;
    $button = [
        [
    ['text' => 'Добавить альбом',
    'callback_data' => 'foto:album_add:1'
        ],
    ['text' => 'Добавить фото в альбом',
    'callback_data' => 'foto:foto_add:2'
        ],
        ]
        ,[
    ['text' => 'Просмотреть альбом',
    'callback_data' => 'foto: album_show:3'
        ],
        ]
    ];
    return $this->sendMessage([
    'text' => 'Выберите действие:',
    'reply_markup' => [
    'inline_keyboard' => $button
    ]
    ]);

    }
}