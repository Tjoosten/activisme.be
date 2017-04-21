<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Types
 */
class Types extends Model
{
	/**
	 * The database table name.
	 *
	 * @var string
	 */
    protected $table = 'types';

	/**
	 * The mass-assign fields for the database table.
	 *
	 * @var array
	 */
    protected $fillable = ['name'];
}
