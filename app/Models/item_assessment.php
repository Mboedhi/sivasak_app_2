<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class item_assessment extends Model
{
    use HasFactory;

    protected $primaryKey = 'assessment_id';
    protected $table = 'item_assessments';
    protected $fillable = ['vendor_id', 'item_id', 'assessment_amount', 'assessment_note', 'assessment_status'];

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function vendor(){
        return $this->belongsTo(vendor::class, 'vendor_id', 'vendor_id');
    }  

    public function negotiate(){
        return $this->hasOne(negotiate::class, 'assessment_id', 'assessment_id');
    }

}
