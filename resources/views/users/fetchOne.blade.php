@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <h1>Mes infos</h1>
                        <p>{{ $user->name }}</p>
                        <p>{{ $user->experience }} XP</p>
                        <p>{{ $user->levels->last() ? $user->levels->last()->label: '' }}</p>
                        <h1>Mes succès</h1>
                        @include('success/byUser')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
