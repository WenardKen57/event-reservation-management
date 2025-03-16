<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rental;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'event_id', 'rental_id', 'meal_package_id', 'status', 'total_amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function mealPackage()
    {
        return $this->belongsTo(MealPackage::class);
    }
}
