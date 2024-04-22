<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


class Event extends Model
{
    use HasFactory, softDeletes;

   protected $fillable = [
        'user_id', 'title', 'slug', 'description', 'start_date', 'end_date', 'published_at', 'featured', 'location', 'image',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // scope to get the events that are published and have a start date greater than or equal to the current date and time,
    // it also can create and sechedule events for the future.
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    // Get the thumbnail image of the event if it exists or return a default image if it doesn't exist from the storage disk
    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');
        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }

}
