<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BotUpdateImageHandler extends UpdateHandler
{
    public function trigger(): bool
    {
        //Когда нужно обрабатывать...
        return isset($this->update->message->photo); // handle regular messages (example)
    }

    public function handle()
    {
//        $debug = var_export($this, true);
//        Log::info($debug);

        $update = $this->update;
        $bot = $this->bot;

        
        // chat_id => $this->update->message->chat->id

        
        $file_id = $this->update->message->photo[count($this->update->message->photo)-1]->file_id;

        $file = $this->getFile(['file_id'=>$file_id]); //Для скачивания готовим ...

        //https://api.telegram.org/file/bot"+Токен+"/getFile?file_id=" + ИдентификаторКартинки;

        $token = config('telebot.bots.bot.token');
        $file_url='https://api.telegram.org/file/bot'.$token.'/'.$file->file_path;
        
        $contents = file_get_contents($file_url);        

        Storage::disk('local')->put($file->file_unique_id.'.jpg', $contents);        

        $path = Storage::disk('local')->path($file->file_unique_id.'.jpg');
        //C:\Git\Laravel_2024_Learn\example-telegram3\storage\app/private\AQADMu4xG2H4iUp4


        $data = $path;

        $message = $this->sendPhoto([
            'photo' => fopen($path, 'r'),
            'filename'=>$file->file_unique_id.'jpg'
        ]);        

        return $this->sendMessage([
            'text' => 'Идентификатор файла: ' . $file->file_unique_id

        ]);
    }
}