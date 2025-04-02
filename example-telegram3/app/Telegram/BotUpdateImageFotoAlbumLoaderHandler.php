<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BotUpdateImageFotoAlbumLoaderHandler extends UpdateHandler
{
    public function trigger(): bool
    {
        //Когда нужно обрабатывать...

        if (!isset($this->update->message->photo)) return false;

        $chatId = $this->update->message->chat->id;
        $UpdateImage=\App\Telegram\DataTelegramController::get_data($chatId,'UpdateImage','');
        if ($UpdateImage=='foto_add') return true;
        /*
        if ($UpdateImage=='foto_add') return true;
        if ($UpdateImage=='foto_add') return true;
        if ($UpdateImage=='foto_add') return true;
        */

        return false; 
    }

    public function handle()
    {
        $update = $this->update;
        $bot = $this->bot;

        $chatId = $this->update->message->chat->id;
        $current_foto_album=\App\Telegram\DataTelegramController::get_data($chatId,'foto_album','');

        $file_id = $this->update->message->photo[count($this->update->message->photo)-1]->file_id;
        $file = $this->getFile(['file_id'=>$file_id]); //Для скачивания готовим ...

        $token = config('telebot.bots.bot.token');
        $file_url='https://api.telegram.org/file/bot'.$token.'/'.$file->file_path;
       
        $contents = file_get_contents($file_url);        
        Storage::disk('local')->put($file->file_unique_id.'.jpg', $contents);        
        $path = Storage::disk('local')->path($file->file_unique_id.'.jpg');
        $data = $path;
        $message = $this->sendPhoto([
            'photo' => fopen($path, 'r'),
            'filename'=>$file->file_unique_id.'jpg'
        ]);        

        //Записать в базу данных:

        $list = new \App\Models\Foto;
        $list->title = $current_foto_album;
        $list->file_id = $file->file_unique_id.'.jpg';
        $list->user_id = $chatId;
        $list->save();

        return $this->sendMessage([
            'text' => 'Фото добавлено в фотоальбом:'.$current_foto_album,
        ]);
    }
}