<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use WeStacks\TeleBot\Laravel\TeleBot;

class ProcessSendMessage implements ShouldQueue
{
    use Queueable;

    public $_chatId;
    public $_message;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $chatId,
        public string $message,
    )
    {
        $this->_chatId=$chatId;
        $this->_message=$message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        TeleBot::sendMessage(['chat_id'=>$this->_chatId,'text'=>$this->_message]);
    }
}