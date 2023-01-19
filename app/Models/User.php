<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'number',
        'role_id',
        'is_active',
        'avatar',
        'money',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }
    public function comments(){
        return $this->hasMany(Item::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
//    public function itemsUsers(){
//        return $this->belongsToMany(Item::class)->withPivot('count','ozu','memory')->withTimestamps();
//    }

    public function itemsWithStatus($status){
        return $this->belongsToMany(Item::class)
            ->wherePivot('status',$status)
            ->withPivot('ozu','memory','count');
    }
    public function itemsWithStatusCart(){
        return $this->belongsToMany(Item::class)
            ->wherePivot('status','in_cart')
            ->withPivot('ozu','memory','count');
    }


    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function userAdminMess(){
        return $this->belongsToMany(User::class, 'admin_user', 'admin_id','user_id')
            ->withPivot('message')
            ->withTimestamps();
    }
    public function adminUserMess(){
        return $this->belongsToMany(User::class, 'admin_user', 'user_id','admin_id')
            ->withPivot('message')
            ->withTimestamps();
    }
}
