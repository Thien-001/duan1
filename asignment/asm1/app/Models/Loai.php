<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    public function loai(){
        return $this->belongsTo(Loai::class);
    }
    

}
