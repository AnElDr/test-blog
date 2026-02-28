@extends('layouts.front')

@section('title', $news->title)

@section('content')
    <p>
        <a class="btn" href="{{ route('front.home') }}">← Back to news</a>
    </p>

    <article class="article">
        <h1>{{ $news->title }}</h1>
        <div class="meta">Published: {{ $news->published_at->format('Y-m-d') }}</div>

        @if($news->image_path)
            <img src="{{ asset('storage/'.$news->image_path) }}" alt="">
        @endif

        <p>{!! nl2br(e($news->content)) !!}</p>
    </article>
@endsection