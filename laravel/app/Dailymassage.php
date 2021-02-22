<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dailymassage extends Model
{
    protected $fillable = [
        'text'
    ];
    public $timestamps = false;
}
