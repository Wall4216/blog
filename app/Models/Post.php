<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'image',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function like()
    {
        // Определяем связь между моделями Post и Like
        return $this->hasMany(Like::class);
    }

    public function likedByUser($userId)
    {
        // Проверяем, лайкнул ли данный пользователь пост
        return $this->like()->where('user_id', $userId)->exists();
    }

    public function likesCount()
    {
        // Получаем количество лайков для поста
        return $this->like()->count();
    }
    protected $appends = ['likes_count'];

    public function getLikesCountAttribute()
    {
        return $this->like()->count();
    }
}
