<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'date', 'location', 'description', 'rsvp_limit', 'user_id'];

    public function rsvps() {
        return $this->hasMany(Rsvp::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }
  
}
