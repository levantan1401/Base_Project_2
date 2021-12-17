<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;
class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = [
        'comments_user_id', 'comments_product_id', 'comments_text','comments_parent','comments_status','comments_rating_id'
    ];
    protected $primarykey = 'id';

    public function scopeSearch($query)
    {
        if ($keyword = request()->keyword) {
            $query = Category::orderBy('created_at', 'DESC')->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }
     public function getUser(){
        return $this->hasOne(User::class,'id','comments_user_id');
    }

    // public function getProduct(){
    //     return $this->hasOne(Product::class, 'id', 'comments_product_id')->select(array('id', 'name'));
    // }

    public function getRating(){
        return $this->hasOne(Rating::class, 'id', 'comments_rating_id');
    }
}
