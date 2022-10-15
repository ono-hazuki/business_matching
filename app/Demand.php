<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /*
    public function consenters()
    {
        return $this->belongsToMany('App\Consenter');
    }
    */
    
    /*
    public function get_users()
    {
        return $this->belongsToMany('App\User');
    }
    */
    
    public function direct_messages()
    {
        return $this->hasMany('App\DirectMessage');
    }
}
