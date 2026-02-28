@extends('layouts.front')

@section('title', 'News')

@section('content')
    <h1 class="page-title">Latest news</h1>
    <p class="subtle">Only active posts are shown here.</p>

    <div class="grid" style="margin-top:14px;">
        @forelse($news as $item)
            <a class="card" href="{{ route('front.news.show', $item) }}">
                @if($item->image_path)
                    <img class="thumb" src="{{ asset('storage/'.$item->image_path) }}" alt="">
                @endif

                <div class="card-body">
                    <h2>{{ $item->title }}</h2>
                    <div class="meta">Published: {{ $item->published_at->format('Y-m-d') }}</div>
                    <div class="excerpt">{{ \Illuminate\Support\Str::limit($item->content, 140) }}</div>
                </div>
            </a>
        @empty
            <div class="card" style="grid-column: span 12;">
                <div class="card-body">
                    <h2>No news yet</h2>
                    <p class="subtle">Create one in the Admin panel.</p>
                </div>
            </div>
        @endforelse
    </div>

    <div class="pagination">
        {{ $news->links() }}
    </div>
@endsection