<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'id', 'or_date', 'or_note', 'userID', 'status'

    ];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'userID');
    }


    public function or_order_detail()
    {
        return $this->hasOne(OrderDetail::class, 'id_order', 'id');
    }

    public function scopeSearch($query)
    {
        if ($keyword = request()->keyword) {
            $query = Order::orderBy('created_at', 'DESC')->where('userID', 'like', '%' . $keyword . '%');
        }
        return $query;
    }
}
