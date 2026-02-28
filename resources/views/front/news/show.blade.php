@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <a class="btn" href="{{ route('front.home') }}">← Back</a>

    <div class="card">
        <h1>{{ $news->title }}</h1>

        <div class="meta">
            Published: {{ $news->published_at->format('Y-m-d') }}
        </div>

        @if($news->image_path)
            <img src="{{ asset('storage/'.$news->image_path) }}">
        @endif

        <p>{!! nl2br(e($news->content)) !!}</p>
    </div>
@endsection