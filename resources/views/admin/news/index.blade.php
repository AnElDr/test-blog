@extends('layouts.app')

@section('title', 'Admin - News')

@section('content')
    <h1>Manage News</h1>

    <a class="btn btn-success" href="{{ route('admin.news.create') }}">+ Add News</a>

    <div class="card">
        <table>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Active</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>

            @foreach($items as $n)
                <tr>
                    <td>{{ $n->title }}</td>
                    <td>{{ $n->published_at->format('Y-m-d') }}</td>
                    <td>{{ $n->is_active ? 'Yes' : 'No' }}</td>
                    <td>{{ $n->image_path ? 'Yes' : 'No' }}</td>
                    <td>
                        <a class="btn" href="{{ route('admin.news.edit', $n) }}">Edit</a>

                        <form action="{{ route('admin.news.destroy', $n) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                    onclick="return confirm('Delete?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {{ $items->links() }}
@endsection