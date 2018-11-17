@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $taskCategory->label }}</div>

                    <div class="card-body">
                        <h1>{{ $taskCategory->label }}</h1>
                        <p>{{ $taskCategory->description }}</p>
                        <h2>Tâches de la catégorie</h2>

                        @foreach($taskCategory->tasks as $task)
                            <li><a href="#" class="task {{ $task->isDone() }}" task-id="{{ $task->id }}">{{ $task->label }} </a></li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", ".task", function() {
                $.get( "/task/check/"+$(this).attr('task-id'), function(data) {
                    if(data=="Ok") {
                        $(this).addClass('is--done');
                    }
                });
            })
        })
    </script>
@endsection
