<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Permissions
 */
class Permissions extends Model
{
    use SoftDeletes;

	/**
	 * The database table name.
	 *
	 * @var string
	 */
    protected $table = 'permissions';

	/**
	 * Mass-assign fields for the permissions table.
	 *
	 * @var array
	 */
    protected $fillable = ['name', 'description'];
}
