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
    
}
