<?php

namespace App\Livewire;

use Livewire\Component;

class ToDo extends Component
{
    public $todo;
    public $active_edit=''; //Запись которую сейчас редактируем
    public $log; //Тестовая переменная для вывода отладочной информации

    public $orderby;
    public $filter;
    public $sort;
    

    public function mount()
    {
        $this->log='start';
        $this->orderby='1';
        $this->filter='all';
        $this->sort='asc';

    }    

    public function render()
    {

        //->having('account_id', '>', 100)

        if ($this->orderby=='2') {
            $query = \App\Models\ToDo::orderBy('deadline',$this->sort);
        }
       else
        {
            $query = \App\Models\ToDo::orderBy('id',$this->sort);
        }

        if ($this->filter=='completed') {
            $query = $query->where('complete', '=', 1);
        } elseif ($this->filter=='active') {
            $query = $query->where('complete', '=', 0);
        } elseif ($this->filter=='has-due-date') {
            $query = $query->where('deadline', '<>', '');
        }


        $this->todo = $query->get();

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


    public function create(string $title, string $data, int $priority)
    {
        // Логируем создание новой задачи
        $this->log = 'create: ' . $title . ' ' . $data. ' '.$priority;

        // Создаем новый объект задачи
        $new = new \App\Models\Todo();
        $new->title = $title;
        $new->priority = $priority;
        $new->complete = false; // Задача не выполнена

        // Преобразуем строку в объект DateTime
        $date = \DateTime::createFromFormat('d/m/Y', $data);
        // Проверяем, успешно ли прошло преобразование
        if ($date) {
            // Устанавливаем срок выполнения задачи в формате "Год-месяц-день"
            $new->deadline = $date->format('Y-m-d');
        } else {
            // Если преобразование не удалось, устанавливаем срок выполнения в null
            $new->deadline = null;
        }

        // Если дата не установлена, устанавливаем срок выполнения в null
        if ($data == 'Due date not set') {
            $new->deadline = null;
        }

        // Сохраняем новую задачу в базе данных
        $new->save();
    }     


    public function change_sort($title){
        $this->sort = $title;
    }
}