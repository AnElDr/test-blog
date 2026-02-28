@extends('layouts.app')

@section('title', $news->getTitle())

@section('content')
    <p style="margin-top:0;">
        <a class="btn" href="{{ route('front.home') }}">
            ← {{ app()->getLocale() === 'lv' ? 'Atpakaļ' : 'Back' }}
        </a>
    </p>

    <div class="card">
        <h1 style="margin:0 0 8px;">
            {{ $news->getTitle() }}
        </h1>

        <div class="meta">
            {{ app()->getLocale() === 'lv' ? 'Datums:' : 'Date:' }}
            {{ $news->published_at->format('Y-m-d') }}
        </div>

        @if($news->image_path)
            <div style="margin: 12px 0;">
                <img src="{{ asset('storage/'.$news->image_path) }}" style="width:100%; max-height:420px; object-fit:cover; border-radius:14px; border:1px solid var(--line);" alt="">
            </div>
        @endif

        <p style="margin:0; line-height:1.7;">
            {!! nl2br(e($news->getContent())) !!}
        </p>
    </div>
@endsection