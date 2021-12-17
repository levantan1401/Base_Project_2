<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Category;
// use App\Models\menu;
class menu extends Model
{
    use HasFactory;
    // public $timestamps = false; // tắt ngày cập nhật
    protected $filled=[
        'menu'
    ]; // làm đầy vào
    protected $primarykey = 'id'; //có 2 khoa ms khai báo
    protected $table = 'menu';
    // public function category()
    //     {
    // return $this->hasMany(Category::class, 'id_menu','id');
    // }
     // public function menu()
    // {
    //     return $this->HasOne(menu::class,'id','id_menu');
    // }

}
