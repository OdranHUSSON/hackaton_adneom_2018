@foreach($taskCategory as $category)
    <h1>{{ $category->label }}</h1>
    @foreach($category->tasks as $task)
        <p>{{ $task->label }}</p>
    @endforeach
@endforeach