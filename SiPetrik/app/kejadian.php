<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kejadian extends Model
{
    public function pelapor()
    {
        return $this->hasOne('App\pelapor');
    }
}
