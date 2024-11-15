<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone_number',
        'email',
        'reservation_date',
        'reservation_time',
        'number_of_people',
        'special_requests',
        'status',
    ];

    // If you need to define relationships, for example, linking bookings to users:
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
