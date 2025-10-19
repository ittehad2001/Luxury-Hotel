<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomAvailability extends Model
{
    use HasFactory;

    protected $table = 'room_availability';

    protected $fillable = [
        'room_category_id',
        'date',
        'available_rooms'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function roomCategory(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class);
    }

    /**
     * Get or create availability record for a specific date and category
     */
    public static function getOrCreateAvailability($roomCategoryId, $date)
    {
        return self::firstOrCreate(
            [
                'room_category_id' => $roomCategoryId,
                'date' => $date
            ],
            [
                'available_rooms' => 3 // Default 3 rooms per category
            ]
        );
    }

    /**
     * Check if rooms are available for booking
     */
    public function hasAvailability($roomsNeeded = 1)
    {
        return $this->available_rooms >= $roomsNeeded;
    }

    /**
     * Decrease available rooms
     */
    public function decreaseAvailability($roomsNeeded = 1)
    {
        $this->available_rooms = max(0, $this->available_rooms - $roomsNeeded);
        $this->save();
    }
}
