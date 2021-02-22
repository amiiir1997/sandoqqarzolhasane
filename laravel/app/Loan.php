<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'account_id', 'value', 'paid','instalment','year','month',
    ];
    public $timestamps = false;
}
