<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loanlist extends Model
{
    protected $fillable = [
        'account_id','date',
    ];
    public $timestamps = false;
}
