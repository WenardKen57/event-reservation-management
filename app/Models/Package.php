<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;
    
    protected $table = 'package';
    protected $fillable = ['package_name', 'event_type', 'price', 'description'];
    public function events()
    {
        return $this->hasMany(Event::class, 'package_id');
    }
}
