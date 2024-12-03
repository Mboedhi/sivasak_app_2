<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class item_assessment extends Model
{
    use HasFactory;

    protected $primaryKey = 'assessment_id';
    protected $table = 'item_assessment';
    protected $fillable = ['vendor_id', 'item_id', 'assessment_amount', 'assessment_note', 'assessment_status'];

    public function item(){
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }

    public function vendor(){
        return $this->belongsTo(vendor::class, 'vendor_id', 'vendor_id');
    }   

}
