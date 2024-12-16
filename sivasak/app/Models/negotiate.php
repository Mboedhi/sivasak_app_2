<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class negotiate extends Model
{
    use HasFactory;
    protected $primaryKey = 'negotiate_id';
    protected $table = 'negotiates';
    protected $fillable = ['assessment_id', 'price_nego', 'result'];

    public function item_assessment(){
        return $this->belongsTo(item_assessment::class, 'assessment_id', 'assessment_id');
    }
}
