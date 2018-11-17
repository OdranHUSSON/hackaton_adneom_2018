@extends('layouts.mobile')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users.css') }}">
@endsection

@section('page-title')
    {{ $isMe ? 'Mon profil': $user->name }}
@endsection

@section('background-image')
    <img class="background" src="{{ asset('img/background-base.jpg') }}" alt="">
@endsection

@section('header')
    <div class="stats">
        <span> {{ $user->success()->count() }} succès obtenus</span>
        <span> {{ $user->tasks()->count() }} tâches effectuées</span>
        <div class="social-share">
            <button class="linkedin"></button>
            <button class="facebook"></button>
            <button class="twitter"></button>
        </div>
    </div>
@endsection

@section('content')
    <section class="progressbar">
        <div class="rank">{{ $currentBestRole ? $currentBestRole->label: 'Aucune rôle actuellement' }}</div>
        @if($nextBestRole)
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $user->experience * 100 / $nextBestRole->required_experience }}%;"></div>
            </div>
            <span class="progress-number"> {{ $user->experience }}/{{ $nextBestRole->required_experience }} </span>
        @endif
    </section>
    <section class="content is-expanded">
        <h2> Last success </h2>
        <ul class="success">
            @foreach($user->success()->orderBy('users_success.created_at')->get() as $success)
                <li class='is--done'>{{ $success->label }}<i class="material-icons">check</i></li>
            @endforeach
        </ul>
    </section>
@endsection
