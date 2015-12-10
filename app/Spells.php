<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spells extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spells';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ref', 'name', 'desc', 'effect', 'price', 'quantity'];
}
