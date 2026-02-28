<!doctype html>
<html>
<head><meta charset="utf-8"><title>Admin - News</title></head>
<body>
<h1>Admin - News</h1>

@if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif

<p><a href="{{ route('admin.news.create') }}">+ Add news</a></p>

<table border="1" cellpadding="8">
    <tr>
        <th>Title</th><th>Date</th><th>Active</th><th>Image</th><th>Actions</th>
    </tr>
    @foreach($items as $n)
        <tr>
            <td>{{ $n->title }}</td>
            <td>{{ $n->published_at }}</td>
            <td>{{ $n->is_active ? 'Yes' : 'No' }}</td>
            <td>{{ $n->image_path ? 'Yes' : 'No' }}</td>
            <td>
                <a href="{{ route('admin.news.edit', $n) }}">Edit</a>
                <form action="{{ route('admin.news.destroy', $n) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $items->links() }}
</body>
</html>