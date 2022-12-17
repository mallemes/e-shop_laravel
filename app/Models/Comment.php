<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [ 'content','item_id','comment','user_id','user'];

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
