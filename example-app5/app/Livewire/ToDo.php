<?php

namespace App\Livewire;

use Livewire\Component;

class ToDo extends Component
{
    public $todo;
    public $active_edit=''; //Запись которую сейчас редактируем
    public $log; //Тестовая переменная для вывода отладочной информации

    public function render()
    {
        $this->todo = \App\Models\ToDo::all();
        //$this->log= 'Вывод списка';
        return view('livewire.to-do');
    }

    public function edit(string $id)
    {
        $this->log = 'edit'.$id;
        $this->active_edit=$id;
    }     
    public function delete(string $id)
    {
        $this->log = 'delete'.$id;
        \App\Models\Todo::find($id)->delete();
    }     

    public function update(string $id, string $newValue)
    {
        $this->log = 'update '.$id.' '.$newValue;
        $item= \App\Models\ToDo::find($id);
        $item->title = $newValue;
        $item->save();     
        $this->active_edit='';
    }     

    public function check(string $id, int $newValue)
    {
        $this->log = 'check '.$id.' '.$newValue;
        $item= \App\Models\ToDo::find($id);
        $item->complete = $newValue;
        $item->save();     
    }     


    public function create(string $title,string $data)
    {
        //Due date not set
        $this->log = 'create: '.$title.' '.$data;

        $new = new \App\Models\Todo();
        $new->title = $title;
        $new->priority = 0;
        $new->complete = false; //0
        $new->deadline = date('d M Y', strtotime($data));
        $new->save();
    }     
}