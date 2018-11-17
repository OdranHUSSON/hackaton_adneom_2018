@extends('layouts.mobile')

@section('page-title')
    {{$taskCategory->label }}
@endsection

@section('content')
    <div class="content is-expanded">
        <a href="#" class="expand"><i class="material-icons">expand_more</i></a>
        <div class="category">
            <div class="category-datas">
                <h2>{{ $taskCategory->label }}</h2>
                <span clas="category-description">{{ $taskCategory->description }}</span>
            </div>
            <div class="category-image">
                <img src="../img/themes/recycle.png" alt="">
            </div>
        </div>
        <ul class="tasks">
            @foreach($taskCategory->tasks as $task)
                <li><a href="#" task-id="{{ $task->id }}" class='task {{ $task->isDone }}'>{{ $task->label }}<i class="material-icons">check</i></a></li>
            @endforeach
        </ul>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", ".task", function() {
                var flag = "is--done";
                if($(this).hasClass(flag)) {
                    $.get( "/task/uncheck/"+$(this).attr('task-id'), function() {});
                    $(this).removeClass(flag);
                }
                else {
                    $.get( "/task/check/"+$(this).attr('task-id'), function() {});
                    $(this).addClass(flag);
                }
            })
        })
    </script>
@endsection
