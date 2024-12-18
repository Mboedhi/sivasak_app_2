<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class complain extends Model
{
    protected $table = 'complains';

    protected $primaryKey = 'complain_id';

    protected $fillable = ["user_id", "vehicle_plate", "vehicle_type", "vehicle_registration", "complain_desc", "complain_status"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(vehicle::class, 'vehicle_id', 'vehicle_id');
    }
}
