<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable =[
        'firstname','lastname','email','address','phone','city','product_id','order_id','status'
    ];
    public function orders()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }
}
