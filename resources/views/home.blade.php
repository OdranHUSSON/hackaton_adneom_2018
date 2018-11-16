@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Catégories</p>
                    @include('tasks/index')
                </div>

                <div class="card-body">
                    <p>Succès</p>
                    @include('success/index')
                </div>

                <div class="card-body">
                    <p>Utilisateurs</p>
                    @include('user/index')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
