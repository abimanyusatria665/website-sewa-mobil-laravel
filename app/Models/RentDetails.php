<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_id',
        'car_id',
        'penalty',
        'status',
        'sub_total',
        'should_be_returned'
    ];

    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
