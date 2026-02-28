@extends('layouts.app')

@section('title', 'Admin - Create News')

@section('content')
    <h1>Create News</h1>

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
        <form method="POST"
              action="{{ route('admin.news.store') }}"
              enctype="multipart/form-data">
            @csrf

            <label>Title</label>
            <input name="title" value="{{ old('title') }}" placeholder="News title">

            <label>Content</label>
            <textarea name="content" rows="7" placeholder="Write news content...">{{ old('content') }}</textarea>

            <label>Date</label>
            <input type="date" name="published_at" value="{{ old('published_at') }}">

            <label style="display:flex; align-items:center; gap:8px; margin: 6px 0 14px;">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }} style="width:auto; margin:0;">
                Active
            </label>

            <label>Image (optional)</label>
            <input type="file" name="image" accept="image/*">

            <div style="display:flex; gap:10px; margin-top:12px;">
                <button class="btn btn-success" type="submit">Save</button>
                <a class="btn" href="{{ route('admin.news.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection