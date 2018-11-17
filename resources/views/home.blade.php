@extends('layouts.home')

@section('page-title')
    Accueil
@endsection

@section('page-class')
    page-eoliene
@endsection

@section('content')
    <section class="category-index">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @foreach($taskCategory as $category)
                <article class="category">
                    <a href="/category/{{ $category->id }}" class="link">
                        <img src="../img/category/1.png" alt="">
                        <span class="category-label">{{ $category->label }}</span>
                    </a>
                </article>
        @endforeach
    </section>

@endsection
