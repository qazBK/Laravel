<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskAddQuestionHandler;

class AddQuestionsCommand extends CommandHandler
{
    protected static $aliases = [ '/addquestion' ];
    protected static $description = 'Send "/addquestion" ';

    public function handle()
    {
        
        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        \App\Telegram\DataTelegramController::set_data($chatId,'addquestion',0);

        \App\Telegram\AskAddQuestionHandler::requestInput($this->bot, $userId);

        return $this->sendMessage([
                'text' => 'Введите вопрос:',
            ]);
    }
}