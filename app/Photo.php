<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
     protected $upload = "/images/";
    protected $fillable = ['name','created_at','updated_at'];
    public function getNameAttribute($image){
        return $this->upload .$image;
    }
    
}
