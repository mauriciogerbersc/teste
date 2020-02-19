<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dvds_legendas extends Model
{   
    protected $table = 'dvds_legendas';

    function dvds() {
        return $this->belongsTo("App\Dvds");
    }
}
