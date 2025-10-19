<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'base_price',
        'description',
        'max_guests',
        'bedrooms',
        'bathrooms',
        'size',
        'image_url'
    ];

    protected $casts = [
        'base_price' => 'float'
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function roomAvailability(): HasMany
    {
        return $this->hasMany(RoomAvailability::class);
    }

    /**
     * Calculate price for a specific date
     */
    public function getPriceForDate($date)
    {
        $dayOfWeek = date('N', strtotime($date)); // 1 = Monday, 7 = Sunday
        $isWeekend = in_array($dayOfWeek, [5, 6]); // Friday = 5, Saturday = 6
        
        if ($isWeekend) {
            return $this->base_price * 1.20; // 20% weekend surcharge
        }
        
        return $this->base_price;
    }
}
