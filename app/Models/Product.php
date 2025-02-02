<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'description', 'image', 'price', 'category_id'
    ];
    public function categorys()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
