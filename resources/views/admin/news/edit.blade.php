<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edit News</title></head>
<body>
<h1>Edit News</h1>

@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div>
        <label>Title</label><br>
        <input name="title" value="{{ old('title', $news->title) }}" style="width:400px;">
    </div>

    <div>
        <label>Content</label><br>
        <textarea name="content" rows="6" style="width:400px;">{{ old('content', $news->content) }}</textarea>
    </div>

    <div>
        <label>Date</label><br>
        <input type="date" name="published_at" value="{{ old('published_at', $news->published_at) }}">
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $news->is_active) ? 'checked' : '' }}>
            Active
        </label>
    </div>

    <div>
        <label>Image (optional)</label><br>
        @if($news->image_path)
            <img src="{{ asset('storage/'.$news->image_path) }}" style="max-width:200px; display:block; margin:8px 0;">
        @endif
        <input type="file" name="image" accept="image/*">
    </div>

    <button type="submit">Update</button>
</form>
</body>
</html>