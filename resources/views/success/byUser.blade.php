@foreach($user->success as $success)
    <p>{{ $success->label }} (obtenu le {{ $success->pivot->created_at }})</p>
@endforeach