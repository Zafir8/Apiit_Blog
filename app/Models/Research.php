<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


class Research extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable = [
        'user_id', 'title', 'slug', 'description', 'published_at', 'featured', 'image',
    ];




    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
