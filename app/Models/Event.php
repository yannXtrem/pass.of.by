<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasMedia;

    protected $fillable = [
        'organizer_id',
        'title',
        'description',
        'date',
        'location',
        'capacity',
        'price',
        'is_published',
        'image_path',
    ];

    protected $casts = [
        'date' => 'datetime',
        'is_published' => 'boolean',
    ];

    // Relations
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'reservations')
            ->withPivot('ticket_number', 'status');
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
}