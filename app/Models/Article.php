<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id',
    'title',
    'slug',
    'summary',
    'category',
    'kecamatan',
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

    /**
     * Every keyword must match at least one searchable column.
     *
     * @param  Builder<Article>  $query
     */
    #[Scope]
    protected function search(Builder $query, ?string $term): void
    {
        $keywords = preg_split('/\s+/', trim((string) $term), -1, PREG_SPLIT_NO_EMPTY);

        foreach ($keywords as $keyword) {
            $like = "%{$keyword}%";

            $query->where(function (Builder $query) use ($like): void {
                foreach (['title', 'summary', 'content', 'category', 'kecamatan', 'author_name', 'tags'] as $column) {
                    $query->orWhere($column, 'like', $like);
                }
            });
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(ArticleLike::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function savedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'saved_articles')
            ->withTimestamps();
    }
}
