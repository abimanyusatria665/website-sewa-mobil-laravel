<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'total_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rentDetails()
    {
        return $this->hasMany(RentDetails::class);
    }
}
