@foreach($success as $s)
    <h1>{{ $s->label }}</h1>
    @foreach($s->users as $user)
        <p>Obtenu par {{ $user->name  }} le {{ \Carbon\Carbon::parse($user->pivot->created_at)->format('d-m-Y') }}</p>
    @endforeach
@endforeach