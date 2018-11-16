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
                            <p>{{ $task->label }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
