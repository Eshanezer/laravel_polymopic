<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable=['name'];

    public function photo(){
        return $this->morphMany('App\Photo','imageable');
    }
}
