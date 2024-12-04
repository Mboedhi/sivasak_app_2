<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questioner extends Model
{
    use SoftDeletes;

    protected $table = 'questioners';

    protected $fillable = [
        'vendor_id',
        'date',
    ];

    public function vendor()
    {
        return $this->belongsTo(vendor::class, 'vendor_id', 'vendor_id');
    }
}
