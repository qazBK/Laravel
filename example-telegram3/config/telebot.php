<?php

return [


    /*-------------------------------------------------------------------------
    | Default Bot Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the bots you wish to use as
    | your default bot for regular use.
    |
    */

    'default' => 'bot',

    /*-------------------------------------------------------------------------
    | Middleware to be applied to the webhook route
    |--------------------------------------------------------------------------
    |
    |
    */
    'middleware' => [],

    /*-------------------------------------------------------------------------
    | Your Telegram Bots
    |--------------------------------------------------------------------------
    | You may use multiple bots. Each bot that you own should be configured here.
    |
    | See the docs for parameters specification:
    | https://westacks.github.io/telebot/#/configuration
    |
    */

    'bots' => [
        'bot' => [
            'token' => '7441136507:AAEbMZJYwmSRukqOjDuyxuL49_ke5iJX0vg',
            'name' => env('TELEGRAM_BOT_NAME', null),
            'api_url' => env('TELEGRAM_API_URL', 'https://api.telegram.org/bot{TOKEN}/{METHOD}'),
            'exceptions' => true,
            'async' => false,
            'storage' => \WeStacks\TeleBot\Storage\JsonStorage::class,
            'http' => [
                'http_errors' => false,
            ],

            'webhook' => [
                // 'url'               => env('TELEGRAM_BOT_WEBHOOK_URL', env('APP_URL').'/telebot/webhook/bot/'.env('TELEGRAM_BOT_TOKEN')),
                // 'certificate'       => env('TELEGRAM_BOT_CERT_PATH', storage_path('app/ssl/public.pem')),
                // 'ip_address'        => '8.8.8.8',
                // 'max_connections'   => 40,
                // 'allowed_updates'   => ["message", "edited_channel_post", "callback_query"],
                // 'secret_token'      => env('TELEGRAM_KEY', null),
            ],

            'poll' => [
                // 'limit'             => 100,
                // 'timeout'           => 0,
                // 'allowed_updates'   => ["message", "edited_channel_post", "callback_query"]
            ],

            'handlers' => [
                // Your update handlers
               // \App\Telegram\StartCommand::class,
               \App\Telegram\EchoCommand::class,
               \App\Telegram\AskEchoHandler::class,
               \App\Telegram\SendCommand::class,
               \App\Telegram\AskSendMessageHandler::class,
               \App\Telegram\StartCommand::class,
                \App\Telegram\FotoCommand::class,
                \App\Telegram\RngCommand::class,
                \App\Telegram\AskRngNumberHandler::class,
                \App\Telegram\AskFotoAlbumAddHandler::class,
                \App\Telegram\BotUpdateImageFotoAlbumLoaderHandler::class,
                \App\Telegram\FotoButtonPressHandler::class,
                \App\Telegram\HelpCommand::class,
                \App\Telegram\SumCommand::class,
                \App\Telegram\TestQuestionsCommand::class,
                \App\Telegram\AddQuestionsCommand::class,
                \App\Telegram\AskAddQuestionHandler::class,
                \App\Telegram\ButtonQuestionsHandler::class,
                \App\Telegram\AskSumN1Handler::class,
                \App\Telegram\AskSumN2Handler::class,
                
                //\App\Telegram\AskAddQuestionHandler::class,
                //\App\Telegram\AskNameHandler::class,
                //\App\Telegram\AskFIOHandler::class,
                \App\Telegram\BotUpdateHandler::class,
                \App\Telegram\BotUpdateImageHandler::class,
                //\App\Telegram\ButtonPressHandler::class,
            ],
        ],

        // 'second_bot' => [
        //     'token'         => env('TELEGRAM_BOT2_TOKEN', '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11'),
        // ],
    ],
];
