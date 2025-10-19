<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_reference',
        'guest_name',
        'guest_email',
        'guest_phone',
        'room_category_id',
        'check_in_date',
        'check_out_date',
        'total_nights',
        'base_price',
        'weekend_surcharge',
        'consecutive_discount',
        'total_price',
        'status'
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'base_price' => 'decimal:2',
        'weekend_surcharge' => 'decimal:2',
        'consecutive_discount' => 'decimal:2',
        'total_price' => 'decimal:2'
    ];

    public function roomCategory(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class);
    }

    /**
     * Generate unique booking reference
     */
    public static function generateBookingReference()
    {
        do {
            $reference = 'BK' . date('Ymd') . rand(1000, 9999);
        } while (self::where('booking_reference', $reference)->exists());
        
        return $reference;
    }
}
