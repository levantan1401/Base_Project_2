<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\product;
class Rating extends Model
{
    use HasFactory;

    protected $fillable =[
        'rt_user_id',
        'rt_product_id',
        'rt_star',
    ];

    public function getProduct(){
        return $this->hasOne(product::class, 'id', 'rt_product_id')->select(array('id', 'name'));
    }

    public function getUser(){
        return $this->hasOne(User::class,'id','rt_user_id');
    }
    public function getComment(){
        return $this->hasMany(Comment::class,'comments_rating_id','id');
    }
}
