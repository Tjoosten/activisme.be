<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vrijwilligers
 */
class Vrijwilligers extends Model
{
	use SoftDeletes;

	/**
	 * The mass-assign fields for the volunteers.
	 *
	 * @var array
	 */
    protected $fillable = ['name', 'email', 'city_id'];

	/**
	 * City relation for the volunteer.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function cities()
	{
		return $this->belongsTo(City::class, 'city_id');
	}
}
