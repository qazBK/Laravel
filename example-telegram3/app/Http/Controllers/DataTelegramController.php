<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataTelegramController extends Controller
{
    //
    public function set_data($bot_id,$name,$value)
    {
        $list =\App\Models\DataTelegramBot::where('bot_id',$bot_id)->first();
        if ($list === null) {
            $list = new \App\Models\DataTelegramBot;
            $list->bot_id=$bot_id;
            $data[$name]=$value;
            $list->data=$data;
            $list->save();
            } else {
            $data=$list->data;
            $data[$name]=$value;
            $list->data=$data;
            $list->save();
            }  
    }

    public function     get_date($bot_id,$name,$default_value)
    {
        $list=\App\Models\DataTelegramBot:: where('bot_id',$bot_id)->first();
        if ($list === null) {
        return $default_value;
        }else {
        $data=$list->data;
        return $data[$name];

        }
}
}