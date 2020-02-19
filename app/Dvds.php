<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dvds extends Model
{   
    protected $table = 'dvds';
    
    public function legendas() {
        return $this->hasMany('App\Dvds_legendas');
    }
}
