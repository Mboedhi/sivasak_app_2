<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;
    protected $primaryKey = 'vehicle_id';
    protected $table = 'vehicles';
    protected $fillable = ['vehicle_plate', 'year', 'vehicle_type', 'vehicle_registration', 'registration_expired', 'vehicle_tax', 'head_cover_date', 'tail_cover_date', 'note', 'user_id'];


    public function complain(): HasMany
    {
        return $this->hasMany(complain::class, 'vehicle_id', 'vehicle_id');
    }
}
