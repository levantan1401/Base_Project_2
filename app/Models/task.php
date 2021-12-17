<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'task';
    protected $fillable = [
        'title', 'note', 'id_staff', 'date', 'status'
    ];

    


}
