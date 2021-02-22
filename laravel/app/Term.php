<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = [
        'term_id', 'name', 'finish','start','sood','karmozd','hazine','kheirie',
        'mandehazine','qest','vam','mandevam','majmoevam','pasdaryafti',
        'paspardakhti','pasmande','start'
    ];
    public $timestamps = false;
}
