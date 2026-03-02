@extends('layouts.app')

@section('title', __('messages.edit_news'))

@section('content')

<h1>{{ __('messages.edit_news') }}</h1>

@if($errors->any())
    <div class="card" style="border-color: rgba(255,107,107,.5);">
        <strong>{{ __('messages.fix_errors') }}</strong>
        <ul style="margin:8px 0 0 18px;">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <form method="POST"
          action="{{ route('admin.news.update', $news) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>{{ __('messages.title') }}</label>
        <input type="text"
               name="title"
               value="{{ old('title', $news->title) }}">

        <label>{{ __('messages.content') }}</label>
        <textarea name="content" rows="7">
{{ old('content', $news->content) }}</textarea>

        <label>{{ __('messages.date') }}</label>
        <input type="date"
               name="published_at"
               value="{{ old('published_at', $news->published_at?->format('Y-m-d')) }}">

        <label style="display:flex; align-items:center; gap:8px; margin: 6px 0 14px;">
            <input type="checkbox"
                   name="is_active"
                   value="1"
                   {{ old('is_active', $news->is_active) ? 'checked' : '' }}
                   style="width:auto; margin:0;">
            {{ __('messages.active') }}
        </label>

        <label>{{ __('messages.image_optional') }}</label>

        @if($news->image_path)
            <div style="margin:10px 0;">
                <div class="meta">
                    {{ __('messages.current_image') }}
                </div>
                <img class="thumb" src="{{ asset($news->image_path) }}" alt="">
            </div>
        @endif

        <input type="file"
               name="image"
               accept="image/*">

        <div style="display:flex; gap:10px; margin-top:12px;">
            <button class="btn btn-success" type="submit">
                {{ __('messages.update') }}
            </button>

            <a class="btn" href="{{ route('admin.news.index') }}">
                {{ __('messages.cancel') }}
            </a>
        </div>
    </form>
</div>

@endsection