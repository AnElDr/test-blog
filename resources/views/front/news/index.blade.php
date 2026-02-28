@extends('layouts.app')

@section('title', 'News')

@section('content')
    <h1>Latest News</h1>

    @foreach($news as $item)
        <div class="card">
            <h2>
                <a href="{{ route('front.news.show', $item) }}">
                    {{ $item->title }}
                </a>
            </h2>

            <div class="meta">
                Published: {{ $item->published_at->format('Y-m-d') }}
            </div>

            @if($item->image_path)
                <img class="thumb" src="{{ asset('storage/'.$item->image_path) }}">
            @endif

            <p>{{ \Illuminate\Support\Str::limit($item->content, 150) }}</p>
        </div>
    @endforeach

    {{ $news->links() }}
@endsection