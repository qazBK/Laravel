<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class TestQuestionsCommand extends CommandHandler
{
    protected static $aliases = [ '/test' ];
    protected static $description = 'Send "/testquestion" ';

    public function handle()
    {
        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        //\App\Telegram\DataTelegramController::set_data($chatId,'testquestion',0);

        //AskTestQuestionHandler::requestInput($this->bot, $userId);

        $item=\App\Models\Question::first();

        $text='';
        //foreach ($list as $item) {
            $text=$text.''.$item->id.') '.$item->title.''.PHP_EOL;
        //}


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
}