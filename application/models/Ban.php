<?php

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ban
 */
class Ban extends Model
{
	/**
	 * The database table name.
	 *
	 * @var string
	 */
	protected $table = 'authencation_bans';

	/**
	 * The mass-assign fields for the database table.
	 *
	 * @var array
	 */
	protected $fillable = ['author_id', 'reason'];

	/**
	 * The creator information relationship for the ban.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		return $this->belongsTo(Authencate::class, 'author_id');
	}
}
