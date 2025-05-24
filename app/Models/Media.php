<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'file_path',
        'type',
    ];

    // Relations
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}