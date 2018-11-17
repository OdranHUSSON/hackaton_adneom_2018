@extends('layouts.mobile')

@section('page-class')
    page-{{$taskCategory->preparedlabel() }}
@endsection
@section('page-title')
    {{$taskCategory->label }}
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tasks.css') }}">
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
        function manageSuccessResult(result, messageStack) {
            var successMessages = result.addedSuccess.map(function (success) {
                return 'Vous avez déverouillez le succès ' + success.label;
            });

            var errorMessages = result.removedSuccess.map(function (success) {
                return 'Vous avez perdu le succès ' + success.label;
            });

            if (successMessages.length > 0) {
                messageStack.success.push(successMessages.join("<br />"));
            }

            if (errorMessages.length > 0) {
                messageStack.fail.push(errorMessages.join("<br />"));
            }
        }

        function manageLevelResult(result, messageStack) {
            var successMessages = result.addedLevel.map(function (level) {
                return 'Vous avez gagnez le niveau ' + level.label;
            });

            var errorMessages = result.removedLevel.map(function (level) {
                return 'Vous avez perdu le niveau ' + level.label;
            });

            if (successMessages.length > 0) {
                messageStack.success.push(successMessages.join("<br />"));
            }

            if (errorMessages.length > 0) {
                messageStack.fail.push(errorMessages.join("<br />"));
            }
        }

        function showMessages(messages, title, type) {
            if (messages.length === 0) {
                return new Promise(function(resolve) {
                    resolve();
                })
            }

            var message = messages.shift();

            return swal(title, message, type).then(function () {
                return showMessages(messages, title, type);
            });
        }

        function manageTaskResult(result) {
            var messageStack = {
                success: [],
                fail: []
            };

            manageSuccessResult(result.success, messageStack);
            manageLevelResult(result.level, messageStack);

            showMessages(messageStack.success, 'Félicitations !', 'success').then(function () {
                return showMessages(messageStack.fail, 'Mince !', 'error');
            });
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
