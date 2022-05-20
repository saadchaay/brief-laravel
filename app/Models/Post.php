<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
    
    public function unLikedBy(User $user)
    {
        return $this->unLikes->contains('user_id', $user->id);
    }

    public function commentedBy(User $user)
    {
        return $this->comments->contains('user_id', $user->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function unLikes()
    {
        return $this->hasMany(Unlike::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy( "created_at", "desc" );
    }
}
