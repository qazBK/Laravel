<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Validator;
use WeStacks\TeleBot\Handlers\RequestInputHandler;

class AskFotoAlbumAddHandler extends RequestInputHandler
{
    public function handle()
    {
        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        $data = $this->update->message()->toArray();
        
        $validator = Validator::make($data, [
            'text' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return $this->sendMessage([
                'text' => 'Не верное наименование альбома!'
            ]);
        }

        $this->acceptInput();
        $title = $validator->validated()['text'];
        
        \App\Telegram\DataTelegramController::set_data($chatId,'foto_album',$title);


        $button = [
            [
            ['text' => 'Посмотреть фото в альбоме',
            'callback_data' => 'foto:album_show:4'
            ],            
            ]
        ,[
            ['text' => 'Добавить фото в альбом',
            'callback_data' => 'foto:foto_add:2'
            ],       

        ]
    ];
        return $this->sendMessage([
                'text' => 'Выбран фотоальбом:'.$title,
                'reply_markup' => [
                    'inline_keyboard' => $button
                    ]   
            ]);
    }
}