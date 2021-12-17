<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'baidang';
    protected $fillable = [
        'briefInfo',
        'tags',
        'image',
        'title',
        'slug',
        'content',
        'status',
        'thutuhienthi',
        'vitrihienthi'
    ];

    public function scopeSearch($query)
    {
        if($keyword = request()->keyword){
            $query = Post::orderBy('created_at','DESC')->where('title','like','%'.$keyword.'%');

        }
        return $query;
    }


}
