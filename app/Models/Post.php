<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function getExcerptAttribute()
    {
        $string = str_replace(['<p>', '</p>'], '', $this->content);
        if (strlen($string) > 50) {
            $string = substr($string, 0, 100) . '...';
        }
        return $string;
    }
}
