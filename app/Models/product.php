<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'id','name', 'slug', 'status', 'price', 'sale_price',
        'image', 'list_image',  'color', 'category_id', 'content', 'quantity'
    ]; 
    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    // public function thongso()
    // {
    //     return $this->hasOne(thongSo::class,'id','id_thongso');
    // }
    
    public function scopeSearch($query)
    {
        if($keyword = request()->keyword){
            $query = product::orderBy('created_at','DESC')->where('name' ,'like','%'.$keyword.'%');
        }
        return $query;
    }
}
