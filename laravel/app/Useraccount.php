<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useraccount extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id', 'user_id', 'value','loansum','loanleft','instalment'
    ];

    public $timestamps = false;

}
