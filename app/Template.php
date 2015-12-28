<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    //
    protected $table = 'templates';

    protected $fillable = ['name', 'description', 'user_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
