<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authencate extends Model
{
	use SoftDeletes;

	/**
	 * The database table name.
	 *
	 * @return string
	 */
	protected $table = 'users';

	/**
	 * The mass-assign fields for the database.
	 *
	 * @var array
	 */
	protected $fillable = ['email', 'blocked', 'name', 'username', 'password', 'ban_id'];

    /**
     * Abilities data for the given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function abilities()
	{
		return $this->belongsToMany('Abilities', 'login_abilities', 'ability_id', 'login_id')
			->withTimestamps();
	}

    /**
     * Permissions data for the given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function permissions()
	{
		return $this->belongsToMany('Permissions', 'login_permissions', 'permissions_id', 'login_id')
			->withTimestamps();
	}
}
