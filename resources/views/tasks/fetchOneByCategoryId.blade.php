@extends('layouts.mobile')


@section('page-class')
    page-{{$taskCategory->preparedlabel() }}
@endsection
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
                @if (file_exists(public_path('img/category/'.$taskCategory->id.'.png')))
                    <img src="../img/category/{{  $taskCategory->id }}.png" alt="">
                @else
                    <img src="../img/category/1.png">
                @endif
            </div>
        </div>
        <ul class="tasks">
            @foreach($taskCategory->tasks as $task)
                <li><a href="#" task-id="{{ $task->id }}" class='task {{ $task->isDone }}'>{{ $task->label }}<i class="material-icons">check</i></a></li>
            @endforeach
        </ul>
    </div>
    <script type="text/javascript">
        function manageTaskResult(result) {
            var successMessages = result.addedSuccess.map(function (success) {
                return 'Vous avez déverouillez le succès ' + success.label;
            });

            var errorMessages = result.removedSuccess.map(function (success) {
                return 'Vous avez perdu le succès ' + success.label;
            });

            if (successMessages.length > 0) {
                var swalPromise = swal('Félicitation !', successMessages.join("<br />"), 'success');

                if (errorMessages.length > 0) {
                    swalPromise.then(function() {
                        swal('Mince !', errorMessages.join("<br />"), 'error')
                    });
                }
            } else if (errorMessages.length > 0) {
                swal('Mince !', errorMessages.join("<br />"), 'error');
            }
        }

        $(document).ready(function() {
            $(document).on("click", ".task", function(event) {
                event.preventDefault();
                var flag = "is--done";
                if($(this).hasClass(flag)) {
                    $.get(
                        "/task/uncheck/"+$(this).attr('task-id'),
                        manageTaskResult
                    );

                    $(this).removeClass(flag);
                }
                else {
                    $.get(
                        "/task/check/"+$(this).attr('task-id'),
                        manageTaskResult
                    );

                    $(this).addClass(flag);
                }
            })
        })
    </script>
@endsection
