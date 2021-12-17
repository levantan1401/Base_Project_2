<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Comment;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
        'avatar',
        'phone',
        'address',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function m_order()
    {
        return $this->hasMany(Order::class,'userID','id');
    }
    public function getUser(){
        return $this->hasMany(Comment::class,'comments_user_id','id');
    }
    public function scopeSearch($query)
    {
        if ($keyword = request()->keyword) {
            $query = User::orderBy('created_at', 'DESC')->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }
}
