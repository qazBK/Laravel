<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Validator;
use WeStacks\TeleBot\Handlers\RequestInputHandler;

class AskAddQuestionHandler extends RequestInputHandler
{
    public function handle()
    {
        $data = $this->update->message()->text;

        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        $this->acceptInput();

        //$data;
        $state_addquestion=\App\Telegram\DataTelegramController::get_data($chatId,'addquestion',0);

        if ($state_addquestion==0) {
            //Ввод вопроса...

            //Сохранить вопрос!
            \App\Telegram\DataTelegramController::set_data($chatId,'addquestion',$state_addquestion+1);
            AskAddQuestionHandler::requestInput($this->bot, $userId);

                $list = new \App\Models\Question;
                $list->title = $data;
                $list->save();
                $id=$list->id;
                \App\Telegram\DataTelegramController::set_data($chatId,'addquestion_id',$id);
    
            return $this->sendMessage([
                'text' => 'Введите ответ номер 1 (правильный): На вопрос id='.$id]);
        }

        if ($state_addquestion==1) {
            //Ввод первого вопроса 
            $id=\App\Telegram\DataTelegramController::get_data($chatId,'addquestion_id',0);
            $list=\App\Models\Question::find($id);
            $list->answer1=$data;
            $list->save();

            //Сохранить превый ответ 
            \App\Telegram\DataTelegramController::set_data($chatId,'addquestion',$state_addquestion+1);
            AskAddQuestionHandler::requestInput($this->bot, $userId);
    
            return $this->sendMessage([
                'text' => 'Введите ответ номер 2:']);
        }
        
        if ($state_addquestion==2) {
            //Ввод первого вопроса 
            $id=\App\Telegram\DataTelegramController::get_data($chatId,'addquestion_id',0);
            $list=\App\Models\Question::find($id);
            $list->answer2=$data;
            $list->save();

            //Сохранить превый ответ 
            \App\Telegram\DataTelegramController::set_data($chatId,'addquestion',$state_addquestion+1);
            AskAddQuestionHandler::requestInput($this->bot, $userId);
    
            return $this->sendMessage([
                'text' => 'Введите ответ номер 3:']);
        }

        if ($state_addquestion==3) {
            //Ввод первого вопроса 
            $id=\App\Telegram\DataTelegramController::get_data($chatId,'addquestion_id',0);
            $list=\App\Models\Question::find($id);
            $list->answer3=$data;
            $list->save();

            //Сохранить превый ответ 
            \App\Telegram\DataTelegramController::set_data($chatId,'addquestion',$state_addquestion+1);
            AskAddQuestionHandler::requestInput($this->bot, $userId);
    
            return $this->sendMessage([
                'text' => 'Введите ответ номер 4:']);
        }


        if ($state_addquestion==4) {
            //Ввод первого вопроса 
            $id=\App\Telegram\DataTelegramController::get_data($chatId,'addquestion_id',0);
            $list=\App\Models\Question::find($id);
            $list->answer4=$data;
            $list->save();

            //Сохранить превый ответ 
            \App\Telegram\DataTelegramController::set_data($chatId,'addquestion',$state_addquestion+1);
            //AskAddQuestionHandler::requestInput($this->bot, $userId);
    
            return $this->sendMessage([
                'text' => 'Все ответы введены']);
        }


    }
}
