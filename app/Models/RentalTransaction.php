<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id', 'rentals_id', 'rental_date', 'return_date', 'quantity', 'total_price'
    ];

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
