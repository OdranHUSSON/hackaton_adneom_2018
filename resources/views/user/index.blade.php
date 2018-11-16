@foreach($users as $user)
    <h1>{{ $user->name }}</h1>
    <h3>Niveaux</h3>
    @foreach($user->levels()->orderBy('pivot_created_at', 'desc')->get() as $level)
        <p>{{ $level->label  }} acquis le {{ \Carbon\Carbon::parse($level->pivot->created_at)->format('d-m-Y') }}</p>
    @endforeach
@endforeach