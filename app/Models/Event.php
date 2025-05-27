<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'date', 'location', 'description', 'rsvp_limit', 'user_id'];
    // RSVP Relation 
    public function rsvps() {
        return $this->hasMany(Rsvp::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // RSVP 
    public function isRSVPdBy($userId): bool
    {
        return $this->rsvps()->where('user_id', $userId)->exists();
    }

    public function isFull(): bool
    {
        return $this->rsvp_limit && $this->rsvps()->count() >= $this->rsvp_limit;
    }
}
