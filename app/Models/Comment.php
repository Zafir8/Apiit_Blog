<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // A comment belongs to a user (author) which is the user who created the comment
    }

    public function post()
    {
        return $this->belongsTo(Post::class); // Corrected to Post::class
    }


}
