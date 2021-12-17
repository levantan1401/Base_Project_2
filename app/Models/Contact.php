<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $fillable = [
        'id', 'name', 'email', 'phone','content','status','admin_send'
    ];
    protected $primarykey = 'id';

    public function scopeSearch($query)
    {
        if ($keyword = request()->keyword) {
            $query = Category::orderBy('created_at', 'DESC')->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }
}

