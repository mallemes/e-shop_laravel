<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Message extends Pivot
{
    use HasFactory;
    protected $table = 'admin_user';
    protected $fillable = ['user_id', 'admin_id','message',];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function admin(){
        return $this->belongsTo(User::class,'admin_id');
    }
}
