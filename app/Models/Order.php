<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'cart_items',
        'total',
        'status',
    ];
     public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');
    }

     public function user()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }

    public function getCartItemsAttribute($value)
    {
        if (is_string($value)) {
            return json_decode($value, true);
        }
        
        return $value;
    }
}

