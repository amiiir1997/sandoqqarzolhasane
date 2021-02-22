<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    protected $fillable = [
        'user_id', 'read', 'title','main','to_admin','created_at'
    ];
    public $timestamps = false;
}
