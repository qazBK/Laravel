<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;
use App\Telegram\AskNameHandler;

class SumCommand extends CommandHandler
{
    protected static $aliases = [ '/Sum', '/sum' ];
    protected static $description = 'Send "/Sum" or "/sum" to get "Help!"';

   
    public function handle()
    {
        // Получаем текст сообщения
        $text = $this->getMessage()->getText();

        // Разбиваем текст на части
        $parts = explode(' ', $text);

        // Проверяем, что введено 3 части: команда и два числа
        if (count($parts) === 3 && is_numeric($parts[1]) && is_numeric($parts[2])) {
            $num1 = (float)$parts[1]; // Приводим к числу
            $num2 = (float)$parts[2]; // Приводим к числу
            $sum = $num1 + $num2; // Считаем сумму

            return $this->sendMessage([
                'text' => "Сумма $num1 и $num2 равна: $sum",
            ]);
        } else {
            return $this->sendMessage([
                'text' => 'Пожалуйста, введите два числа после команды. Пример: /sum 5 10',
            ]);
        }
    }
}