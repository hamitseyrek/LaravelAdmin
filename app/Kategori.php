<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategoriler";
    protected $guarded = [];

    // fillable demek sadece bu alanlar doldurulabilir demek
    // protected $fillable = ["baslik", "aciklama", "slug","user_id"];

    public function yazilari(){
        return $this->hasMany("App\Yazi", "user_id");
    }
}
