<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'value', 'income', 'description','charity','year','month',
    ];
    public $timestamps = false;
}
