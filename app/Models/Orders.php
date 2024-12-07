<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id','quantity','total_price','status'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function products()
        {
            return $this->hasMany(Product::class,'id','product_id');
        }
    public function shipping()
        {
            return $this->hasOne(Shipping::class,'order_id');
        }
}
