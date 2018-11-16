@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Me</div>

                    <div class="card-body">
                        <h1>Mes infos</h1>
                        <p>{{ $user->name }}</p>
                        <p>{{ $user->experience }} XP</p>
                        <p>{{ $user->level() }}</p>
                        <h1>Mes succès</h1>
                        <p>TODO</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
