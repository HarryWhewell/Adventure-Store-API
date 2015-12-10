<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapons extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'weapons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ref', 'type', 'name', 'desc', 'damage', 'price', 'quantity'];
}
