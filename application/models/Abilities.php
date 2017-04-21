<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Abilities
 */
class Abilities extends Model
{
    use SoftDeletes;

    /**
     * The database table name.
     *
     * @var string
     */
    protected $table = 'abilities';

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}