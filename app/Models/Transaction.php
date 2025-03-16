<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rental;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'transactionable_id', 'transactionable_type', 'events_id', 'rentals_id', 'meal_package_id', 'status', 'total_amount'
    ];
    public function transactionable()
    {
        return $this->morphTo();
    }

}
