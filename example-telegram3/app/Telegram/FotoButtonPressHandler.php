<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CallbackHandler;
//use App\Models\Test;

class FotoButtonPressHandler extends CallbackHandler
{
    // Example: "foto::6"
    protected string $match = "/^foto:(\w+):(\d+)$/";

    public function handle()
    {
        [$action, $id] = $this->arguments(); // 
        //Действие... 

/*
        $result = match ($action) {
            'update' => $this->update($id),
            'delete' => $this->delete($id),
            default => null
        };
*/

        //$this->ReplyKeyboardRemove();

        $this->sendMessage([
            'text' => 'Нажата кнопка: '.$action.' id:'.$id,
        ]);
        $this->answerCallbackQuery(); //Кнопка выполнила действие... не будет анимации ожидания...
    }

}
