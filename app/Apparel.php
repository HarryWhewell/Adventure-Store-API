<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apparel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'apparel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ref', 'type', 'name', 'desc', 'armour', 'price', 'quantity'];
}
