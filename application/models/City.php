<?php

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 */
class City extends Model
{
	/**
	 * Mass-assign fields for the city table.
	 *
	 * @var array
	 */
	protected $fillable = [];

	/**
	 * Province data relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function province()
	{
		return $this->belongsTo(Province::class, 'province_id');
	}
}
