<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Actions
 */
class Actions extends Model
{
    use SoftDeletes;

    /**
     * The database table 
     *
     * @return string
     */
    protected $table = 'links';

    /**
     * Mass-assign fields for tha database table. 
     *
     * @return array
     */
    protected $fillable = ['author_id', 'type_id', 'link', 'name', 'end_date'];

	/**
	 * Type relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function types()
    {
        return $this->belongsTo(Types::class, 'type_id');
    }
}
