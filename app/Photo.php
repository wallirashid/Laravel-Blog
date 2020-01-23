<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $upload = "/images/";
    protected $fillable = ['name'];
    public function getNameAttribute($image){
        return $this->upload .$image;
    }
    
}
