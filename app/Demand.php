<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function consenters()
    {
        return $this->hasMany('App\Consenter');
    }
    
    public function direct_messages()
    {
        return $this->hasMany('App\DirectMessage');
    }
}
