<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use mysql_xdevapi\Table;

class Cart extends Pivot

{
    protected $table = 'item_user';
    protected $fillable = ['count', 'ozu', 'memory',];

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


    use HasFactory;
}
