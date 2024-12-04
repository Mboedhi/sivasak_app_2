<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_id';
    protected $table = 'items';
    protected $fillable = ['item_name', 'item_type','item_desc','item_price','expired_date','attachment'];

    public function item_assessment(){
        return $this->hasMany(item_assessment::class, 'item_id', 'item_id');
    }

}
