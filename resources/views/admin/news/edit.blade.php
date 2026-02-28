@extends('layouts.app')

@section('title', 'Admin - Edit News')

@section('content')
    <h1>Edit News</h1>

    @if($errors->any())
        <div class="card" style="border-color: rgba(255,107,107,.5);">
            <strong>Please fix the following:</strong>
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h3 style="margin:0 0 10px;">English</h3>

            <label>Title (EN)</label>
            <input name="title_en" value="{{ old('title_en', $news->title_en) }}" placeholder="English title">

            <label>Content (EN)</label>
            <textarea name="content_en" rows="6" placeholder="English content...">{{ old('content_en', $news->content_en) }}</textarea>

            <hr style="border:0; border-top:1px solid var(--line); margin:16px 0;">

            <h3 style="margin:0 0 10px;">Latvian</h3>

            <label>Title (LV)</label>
            <input name="title_lv" value="{{ old('title_lv', $news->title_lv) }}" placeholder="Latviešu virsraksts">

            <label>Content (LV)</label>
            <textarea name="content_lv" rows="6" placeholder="Saturs latviski...">{{ old('content_lv', $news->content_lv) }}</textarea>

            <hr style="border:0; border-top:1px solid var(--line); margin:16px 0;">

            <label>Date</label>
            <input type="date"
                   name="published_at"
                   value="{{ old('published_at', $news->published_at?->format('Y-m-d')) }}">

            <label style="display:flex; align-items:center; gap:8px; margin: 6px 0 14px;">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       {{ old('is_active', $news->is_active) ? 'checked' : '' }}
                       style="width:auto; margin:0;">
                Active
            </label>

            <label>Image (optional)</label>
            @if($news->image_path)
                <div style="margin:10px 0;">
                    <div class="meta">Current image:</div>
                    <img class="thumb" src="{{ asset('storage/'.$news->image_path) }}" alt="">
                </div>
            @endif
            <input type="file" name="image" accept="image/*">

            <div style="display:flex; gap:10px; margin-top:12px;">
                <button class="btn btn-success" type="submit">Update</button>
                <a class="btn" href="{{ route('admin.news.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection