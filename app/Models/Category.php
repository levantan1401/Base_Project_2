<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'id', 'name', 'slug', 'status'
    ];
    protected $primarykey = 'id'; //có 2 khoa ms khai báo
    public function product()
    {
        return $this->hasMany(product::class, 'id', 'id');
    }

    public function scopeSearch($query)
    {
        if ($keyword = request()->keyword) {
            $query = Category::orderBy('created_at', 'DESC')->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }
}
