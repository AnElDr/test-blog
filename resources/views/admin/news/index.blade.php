@extends('layouts.app')

@section('title', 'Admin - News')

@section('content')
    <h1>{{ __('messages.manage_news') }}</h1>

    <a class="btn btn-success" href="{{ route('admin.news.create') }}">
        {{ __('messages.add_news') }}
    </a>

    <div class="card">
        <table>
            <tr>
                <th>{{ __('messages.title') }}</th>
                <th>{{ __('messages.date') }}</th>
                <th>{{ __('messages.active') }}</th>
                <th>{{ __('messages.image') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>

            @foreach($items as $n)
                <tr>
                    <td>{{ $n->title }}</td>
                    <td>{{ $n->published_at->format('Y-m-d') }}</td>
                    <td>{{ $n->is_active ? __('messages.yes') : __('messages.no') }}</td>
                    <td>{{ $n->image_path ? __('messages.yes') : __('messages.no') }}</td>
                    <td>
                        <a class="btn" href="{{ route('admin.news.edit', $n) }}">
                            {{ __('messages.edit') }}
                        </a>

                        <form action="{{ route('admin.news.destroy', $n) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {{ $items->links() }}
@endsection