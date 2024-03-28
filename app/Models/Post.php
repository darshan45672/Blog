<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'slug',
        'body',
        'published_at',
        'featured',
    ];

    protected $casts = [
            'published_at' => 'datetime',
        ];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function getExcerpt(){
        return Str::limit(strip_tags($this->body),5);
    }
    public function getReadingTime(){
        return round(str_word_count($this->body)/2);
    }
}
