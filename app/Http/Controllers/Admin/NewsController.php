<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $items = News::orderByDesc('published_at')->paginate(10);
        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['required','string'],
            'published_at' => ['required','date'],
            'is_active' => ['nullable','boolean'],
            'image' => ['nullable','image','max:2048'],
        ]);

        if (empty($data['title_en']) && empty($data['title_lv'])) {
            return back()
                ->withErrors(['title_en' => 'Provide at least one title (EN or LV).'])
                ->withInput();
        }

        if (empty($data['content_en']) && empty($data['content_lv'])) {
            return back()
                ->withErrors(['content_en' => 'Provide at least one content (EN or LV).'])
                ->withInput();
        }

        $data['is_active'] = (bool) ($request->input('is_active', false));

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News created.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title_en' => ['nullable','string','max:255'],
            'title_lv' => ['nullable','string','max:255'],
            'content_en' => ['nullable','string'],
            'content_lv' => ['nullable','string'],

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
}