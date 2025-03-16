<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealPackageTransaction extends Model
{
    protected $fillable = ['meal_package_id', 'quantity'];
    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
