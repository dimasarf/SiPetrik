<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelapor extends Model
{
    public function kejadian()
    {
        return $this->hasMany(kejadian::class);
    }
}