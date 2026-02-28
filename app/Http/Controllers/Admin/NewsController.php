<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = News::orderByDesc('published_at')->paginate(10);
        return view('admin.news.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['required','string'],
            'published_at' => ['required','date'],
            'is_active' => ['nullable','boolean'],
            'image' => ['nullable','image','max:2048'],
        ]);

        $data['is_active'] = (bool) ($request->input('is_active', false));

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News created.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['required','string'],
            'published_at' => ['required','date'],
            'is_active' => ['nullable','boolean'],
            'image' => ['nullable','image','max:2048'],
        ]);

        $data['is_active'] = (bool) ($request->input('is_active', false));

        if ($request->hasFile('image')) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News updated.');
    }

    public function destroy(News $news)
    {
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
