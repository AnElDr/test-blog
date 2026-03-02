<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'published_at',
        'is_active',
        'image_path',
    ];

    protected $casts = [
    'published_at' => 'date',
    'is_active' => 'boolean',
    ];

    public function getTitle(): string
    {
        $locale = app()->getLocale();
        return $locale === 'lv'
            ? ($this->title_lv ?? $this->title_en ?? $this->title ?? '')
            : ($this->title_en ?? $this->title_lv ?? $this->title ?? '');
    }

    public function getContent(): string
    {
        $locale = app()->getLocale();
        return $locale === 'lv'
            ? ($this->content_lv ?? $this->content_en ?? $this->content ?? '')
            : ($this->content_en ?? $this->content_lv ?? $this->content ?? '');
    }

}
