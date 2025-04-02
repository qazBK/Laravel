<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CallbackHandler;
//use App\Models\Test;
use Illuminate\Support\Facades\DB;

class FotoButtonPressHandler extends CallbackHandler
{
    // Example: "foto::6"
    protected string $match = "/^foto:(\w+):(\w+)$/";

    public function handle()
    {

        $userId = $this->update->user()->id;
        $chatId = $this->update->chat()->id;

        [$action, $id] = $this->arguments(); // 
        //Действие... 

        //Редактируем ранее выведенное сообщение.
        //$this->answerCallbackQuery(); //Кнопка выполнила действие... не будет анимации ожидания...
        //$this->editMessageText(['text' => 'Выбрано действие:'.$action]);

        $current_foto_album=\App\Telegram\DataTelegramController::get_data($chatId,'foto_album','');

        if ($action=='album_add') {
            //Добавить Альбом
            //Запрос на ввод названия альбома
           
            AskFotoAlbumAddHandler::requestInput($this->bot, $userId);
            return $this->sendMessage([
                'text' => 'Введите наименование альбома:',
            ]);
                        
        } elseif ($action=='album_list') {
            //Показать альбомы список

            $albums = DB::table('fotos')
            ->select(DB::raw('title'))
            ->where('user_id', '=', $userId)
            ->groupBy('title')
            ->get();

            $button = [];

            foreach ($albums as $album) {
                $bt=[['text' => $album->title]];
                $button[]=$bt;
            }   
            //'callback_data' => 'foto:album_select:'.base64_encode($album->title)         

            //Предложить выбрать из списка (кнопки)

            
            //Переключиться на этот альбом
            return $this->sendMessage([
                'text' => 'Список Альбомов:',
                'reply_markup' => [
                    'keyboard' => $button
                    ]   

            ]);
            
        } elseif ($action=='album_show') {
            //Показать фото из этого альбома ...

        } elseif ($action=='album_select') {
            //$id альбома
            //Выбран конкретный альбом
            //Переключиться на этот альбом
            //Предложить действия с альбомом
            //\App\Telegram\DataTelegramController::set_data($chatId,'foto_album','');


        } elseif ($action=='foto_add') {
            //Добавить фото в альбом
            //Проверить что альбом выбран
            //Предложить загрузить фото в выбранный альбом...
            //Просто ждем фото ... 
            \App\Telegram\DataTelegramController::set_data($chatId,'UpdateImage','foto_add');
            return $this->sendMessage([
                'text' => 'Присылайте фото, они будут добавлены в альбом: '.$current_foto_album,
            ]);
        }

/*        $result = match ($action) {
            'update' => $this->update($id),
            'delete' => $this->delete($id),
            default => null
        };
*/

        //$this->ReplyKeyboardRemove();

/*        $this->sendMessage([
            'text' => 'Нажата кнопка: '.$action.' id:'.$id,
        ]);
*/
    }

}