<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'order_detail';
    protected $fillable = [
        'id_order', 'id_product','quantity','price'
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'id_order');
    }

    public function od_product()
    {
        return $this->hasOne(product::class, 'id', 'id_product');
    }
}
