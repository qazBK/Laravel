<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DefStudio\Telegraph\Models\TelegraphChat;

class TestController extends Controller
{
    public function index() {

        //        use DefStudio\Telegraph\Models\TelegraphChat;
        $chat = TelegraphChat::find(1); //id первого чата в базе данных 
        $chat->message('hello')->send();
        $chat->html("<b>hello</b>\n\nI'm a bot!")->send();
        $chat->markdown('*hello*')->send();        
        return "test-OK";
    }    
}