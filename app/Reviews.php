<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_ref', 'stars', 'body', 'author'];
}
