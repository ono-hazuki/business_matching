<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectMessage extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function demand()
    {
        return $this->belongsTo('App\Demand');
    }
}
