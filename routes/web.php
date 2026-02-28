<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Models\News;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend
Route::get('/', function () {
    $news = News::where('is_active', true)
        ->orderByDesc('published_at')
        ->paginate(6);

    return view('front.news.index', compact('news'));
})->name('front.home');

Route::get('/news/{news}', function (News $news) {
    abort_unless($news->is_active, 404);
    return view('front.news.show', compact('news'));
})->name('front.news.show');

// Backend (admin)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('news', AdminNewsController::class);
});