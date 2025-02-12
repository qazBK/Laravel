<div>
<div class="container m-5 p-2 rounded mx-auto bg-light shadow">
    <!-- App title section -->
    <div class="row m-1 p-4">
        <div class="col">
            <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                <u>My Todo-s</u>
            </div>
        </div>
    </div>
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-11 mx-auto">
            <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                <div class="col">
                    <input x-ref="new_todo" class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Add new ..">
                </div>
                <div class="col-auto m-0">
                <select x-ref="new_priority" class="custom-select custom-select-sm btn my-2">
                    <option value=0 selected style="background-color: green;">Низкий</option>
                    <option value=1 style="background-color: yellow;">Средний</option>
                    <option value=2 style="background-color: red;">Высокий</option>
                </select>                    
                </div>
                <div class="col-auto m-0 px-2 d-flex align-items-center">
                    <label x-ref="new_date" class="text-secondary my-2 p-0 px-1 view-opt-label due-date-label d-none">Due date not set</label>
                    <i class="fa fa-calendar my-2 px-1 text-primary btn due-date-button" data-toggle="tooltip" data-placement="bottom" title="Выбрать дату"></i>
                    <i class="fa fa-calendar-times-o my-2 px-1 text-danger btn clear-due-date-button d-none" data-toggle="tooltip" data-placement="bottom" title="Очистить дату"></i>
                </div>
                <div class="col-auto px-0 mx-0 mr-2">
                    <button type="button" class="btn btn-primary"
                    wire:click="create($refs.new_todo.value, $refs.new_date.innerText,$refs.new_priority.value)"
                    >Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="p-2 mx-4 border-black-25 border-bottom"></div>
    <!-- View options section -->
    <div class="row m-1 p-3 px-5 justify-content-end">
        <div class="col-auto d-flex align-items-center">
            <label class="text-secondary my-2 pr-2 view-opt-label">Фильтр</label>
            <select class="custom-select custom-select-sm btn my-2" wire:model.change="filter">
                <option value="all" selected>Все</option>
                <option value="completed">Выполненные</option>
                <option value="active">Активные</option>
                <option value="has-due-date">С датой</option>
            </select>
        </div>
        <div class="col-auto d-flex align-items-center px-1 pr-3">
            <label class="text-secondary my-2 pr-2 view-opt-label">Сортировка</label>
            <select class="custom-select custom-select-sm btn my-2" wire:model.change="orderby">
                <option value="1" selected>По созданию</option>
                <option value="2">По дате</option>

            </select>
            @if ($sort == 'asc')
                <i wire:click="change_sort('desc')"
                class="fa fa fa-sort-amount-asc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom" title="Ascending"></i>
            @else
                <i wire:click="change_sort('asc')"
                class="fa fa fa-sort-amount-desc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom" title="Descending"></i>
            @endif
 
        </div>
    </div>
    <!-- Todo list section -->

    {{$log}}

    <div class="row mx-1 px-5 pb-3 w-80">
        <div class="col mx-auto">

            @foreach ($todo as $row)


            <div class="row px-3 align-items-center todo-item rounded">
                <div class="col-auto m-1 p-0 d-flex align-items-center">
                    @if ($row->priority == '0') 
                        <i class="fa fa-flag my-2 px-2 text-success" data-toggle="tooltip" data-placement="bottom" title=""></i>
                    @endif
                    @if ($row->priority == '1') 
                        <i class="fa fa-flag my-2 px-2 text-warning" data-toggle="tooltip" data-placement="bottom" title=""></i>
                    @endif
                    @if ($row->priority == '2') 
                        <i class="fa fa-flag my-2 px-2 text-danger" data-toggle="tooltip" data-placement="bottom" title=""></i>
                    @endif
                </div>

                <div class="col-auto m-1 p-0 d-flex align-items-center">
                    <h2 class="m-0 p-0">
                        @if ($row->complete == 0)
                            <i wire:click="check('{{ $row->id }}',1)" class="fa fa-square-o text-primary btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Mark as complete"></i>
                        @else
                            <i wire:click="check('{{ $row->id }}',0)" class="fa fa-check-square-o text-primary btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Mark as todo"></i>
                        @endif
                    </h2>
                </div>
                <div class="col px-1 m-1 d-flex align-items-center">
                
                
                    @if ($row->id == $active_edit)
                        <input type="text" class="form-control form-control-lg border-0 edit-todo-input rounded px-3" value="{{$row->title}}"
                        x-ref="title_{{ $row->id }}"
                        wire:change.debounce="update('{{ $row->id }}', $refs.title_{{ $row->id }}.value)"
                        
                        />
                    @else
                        <input type="text" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" readonly value="{{$row->title}}" title="" />
                    @endif
                </div>
                <div class="col-auto m-1 p-0 px-3 ">
                    <div class="row">
                        <div class="col-auto d-flex align-items-center rounded bg-white border border-warning">
                            <i class="fa fa-hourglass-2 my-2 px-2 text-warning btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Due on date"></i>
                            <h6 class="text my-2 pr-2">{{$row->deadline}}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-auto m-1 p-0 todo-actions">
                    <div class="row d-flex align-items-center justify-content-end">
                        <h5 class="m-0 p-0 px-2">
                            <i x-on:click="$wire.edit({{$row->id}})" class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Редактировать задание"></i>
                        </h5>
                        <h5 class="m-0 p-0 px-2">
                            <i wire:confirm="Точно удаляем?" wire:click="delete('{{ $row->id }}')" class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Удалить Задание"></i>
                        </h5>
                    </div>
                    <div class="row todo-created-info">
                        <div class="col-auto d-flex align-items-center pr-2">
                            <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                            <label class="date-label my-2 text-black-50">28th Jun 2020</label>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            
        </div>
    </div>
</div>
</div>