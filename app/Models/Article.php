<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'title',
    'slug',
    'summary',
    'category',
    'status',
    'author_name',
    'tags',
    'caption',
    'photo_credit',
    'content',
    'document_path',
    'document_name',
    'cover_image_path',
    'review_note',
    'views',
    'published_at',
])]
class Article extends Model
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'published_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function savedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'saved_articles')
            ->withTimestamps();
    }
}
