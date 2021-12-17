<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baohong extends Model
{

    use HasFactory;
    protected $table = 'baohong';
    protected $fillable = [
        'id_user', 'id_product','tinhtrang','status','image'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
    public function getuser()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
