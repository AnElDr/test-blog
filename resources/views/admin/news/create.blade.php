<!doctype html>
<html>
<head><meta charset="utf-8"><title>Create News</title></head>
<body>
<h1>Create News</h1>

@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Title</label><br>
        <input name="title" value="{{ old('title') }}" style="width:400px;">
    </div>

    <div>
        <label>Content</label><br>
        <textarea name="content" rows="6" style="width:400px;">{{ old('content') }}</textarea>
    </div>

    <div>
        <label>Date</label><br>
        <input type="date" name="published_at" value="{{ old('published_at') }}">
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
            Active
        </label>
    </div>

    <div>
        <label>Image (optional)</label><br>
        <input type="file" name="image" accept="image/*">
    </div>

    <button type="submit">Save</button>
</form>
</body>
</html>