<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yorum extends Model
{
    protected $table = "yorumlar";
    protected $guarded = [];


    public function kullanici(){
        return $this->belongsTo("App\User", "user_id");
    }

    public function yazi(){
        return $this->belongsTo("App\Yazi", "yazi_id");
    }
}
