<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class FotoCommand extends CommandHandler
{
    protected static $aliases = [ '/foto' ];
    protected static $description = 'Send "/foto"';

    public function handle()
    {
        
        $userId = $this->update->user()->id;
        //$chatId = $this->update->chat()->id;

        $button = [
            [
            ['text' => 'Добавить альбом',
            'callback_data' => 'foto:album_add:1'
            ],            
            ['text' => 'Просмотреть список альбомов',
            'callback_data' => 'foto:album_list:3'
            ],           
            ]
        ,[
            ['text' => 'Добавить фото в альбом',
            'callback_data' => 'foto:foto_add:2'
            ],            
            ['text' => 'Посмотреть фото в альбоме',
            'callback_data' => 'foto:album_show:2'
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