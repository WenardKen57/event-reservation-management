<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    
    protected $table = 'events';
    protected $fillable = ['users_id', 'event_name', 'event_date', 'event_time', 'event_type',
        'guest_count', 'status', 'total_price', 'package_id'];
}
