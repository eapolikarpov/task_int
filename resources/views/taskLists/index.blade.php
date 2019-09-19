@extends('layouts.app')

@section('content')



    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма нового списка -->
        <form action="/taskList" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя Списка -->
            <div class="form-group">
                <label for="taskList" class="col-sm-3 control-label">Список</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="taskList-name" class="form-control">
                </div>
            </div>

            <!-- Кнопка добавления списка -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить список
                    </button>
                </div>
            </div>
        </form>
    </div>


    @if (count($taskLists) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущий список
            </div>

            <div class="panel-body">
                <table class="table table-striped taskList-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Tasklists</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($taskLists as $taskList)
                        <tr>
                            <!-- Имя списка -->
                            <td class="table-text">
                                <div>{{ $taskList->name }}</div>
                            </td>

                            <!-- Кнопка Удалить -->
                            <td>
                                <form action="/taskList/{{$taskList->id}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-taskList-{{ $taskList->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
