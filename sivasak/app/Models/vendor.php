<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class vendor extends Model
{
    use HasFactory;
    protected $primaryKey = 'vendor_id';
    protected $table = 'vendors';
    protected $fillable = ['user_id', 'rekanan', 'company_name', 'NIB', 'address', 'NPWP', 'NPWP_address', 'business_type', 'leader_name', 'contact_person', 'item_type', 'payment_address', 'bank', 'acc_num', 'behalf', 'status'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function item_assessment(){
        return $this->hasOne(item_assessment::class, 'vendor_id', 'vendor_id');
    }

}
