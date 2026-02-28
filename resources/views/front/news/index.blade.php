@extends('layouts.app')

@section('title', app()->getLocale() === 'lv' ? 'Jaunumi' : 'News')

@section('content')
    <h1 style="margin: 0 0 8px;">
        {{ app()->getLocale() === 'lv' ? 'Jaunākie' : 'Latest news' }}
    </h1>

    <p class="meta">
        {{ app()->getLocale() === 'lv' ? 'Šeit redzami tikai aktīvie ieraksti.' : 'Only active posts are shown here.' }}
    </p>

    @forelse($news as $item)
        <div class="card">
            <h2 style="margin:0 0 6px;">
                <a href="{{ route('front.news.show', $item) }}">
                    {{ $item->getTitle() }}
                </a>
            </h2>

            <div class="meta">
                {{ app()->getLocale() === 'lv' ? 'Datums:' : 'Date:' }}
                {{ $item->published_at->format('Y-m-d') }}
            </div>

            @if($item->image_path)
                <div style="margin: 10px 0;">
                    <img class="thumb" src="{{ asset('storage/'.$item->image_path) }}" alt="">
                </div>
            @endif

            <p style="margin: 0;">
                {{ \Illuminate\Support\Str::limit($item->getContent(), 180) }}
            </p>
        </div>
    @empty
        <div class="card">
            <h2 style="margin:0 0 6px;">
                {{ app()->getLocale() === 'lv' ? 'Nav jaunumu' : 'No news yet' }}
            </h2>
            <p class="meta" style="margin:0;">
                {{ app()->getLocale() === 'lv' ? 'Izveido ierakstu admin panelī.' : 'Create one in the Admin panel.' }}
            </p>
        </div>
    @endforelse

    <div style="margin-top: 14px;">
        {{ $news->links() }}
    </div>
@endsection