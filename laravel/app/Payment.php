<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'account_id', 'loan_id', 'value','created_at',
    ];
    public $timestamps = false;
}
