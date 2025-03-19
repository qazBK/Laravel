<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CallbackHandler;
//use App\Models\Test;

class ButtonQuestionsHandler extends CallbackHandler
{
    // Example: "answer:4:1"
    protected string $match = "/^answer:(\d+):(\d+)$/";
    

    public function handle()
    {
        $chatId = $this->update->chat()->id;
        [$id, $answer] = $this->arguments(); // "4", "1"

        //'text' => 'Нажата кнопка вопроса: '.$id.' Ответ:'.$answer,

        $this->answerCallbackQuery(); //Кнопка выполнила действие... не будет анимации ожидания...
        $scores=\App\Telegram\DataTelegramController::get_data($chatId,'scores',0);
        if ($answer=="1") {
            
            \App\Telegram\DataTelegramController::set_data($chatId,'scores',$scores+1);
            $this->sendMessage([
                'text' => 'Ответ правильный '
            ]);
            $this->sendMessage([
                'text' => 'Баллы: '. $scores
            ]);
        } else {
            $this->sendMessage([
                'text' => 'Ответ НЕ правильный '
            ]);

        }

        $item = \App\Models\Question::where('id','>', $id)->first(); //Следующий вопрос...
        

        //Вопросы еще есть...
        if ($item) {        

        $text='';
        $text=$text.''.$item->id.') '.$item->title.''.PHP_EOL;

        $button = [
            ['text' => $item->answer1,
            'callback_data' => 'answer:'.$item->id.':1'
            ],            
            ['text' => $item->answer2,
            'callback_data' => 'answer:'.$item->id.':2'
            ],            
            ['text' => $item->answer3,
            'callback_data' => 'answer:'.$item->id.':3'
            ],            
            ['text' => $item->answer4,
            'callback_data' => 'answer:'.$item->id.':4'
            ]            
        ];
        shuffle($button); //перемешать...


        return $this->sendMessage([
            'text' => 'Ответьте на вопрос: '.PHP_EOL . $text,
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        $button[0],
                        $button[1]
                    ],
                    [
                        $button[2],
                        $button[3]
                    ]
                    ]
                ]   

        ]);        
    }
    else
    {
        \App\Telegram\DataTelegramController::set_data($chatId,'scores',1);
        //Нет вопросов...
        return $this->sendMessage([
            'text' => 'Вопросы закончились... ',
        ]);
    }
    }

}