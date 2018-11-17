@extends('layouts.home')

@section('page-title')
    Accueil
@endsection

@section('page-class')
    page-eoliene
@endsection

@section('content')
    <div class="content is-expanded">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @foreach($taskCategory as $category)
            <a href="/category/{{ $category->id }}">{{ $category->label }}</a>
        @endforeach
    </div>

@endsection
