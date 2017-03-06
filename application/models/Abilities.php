<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 *
 */
class Abilities extends Model
{
    /**
     * The database table name
     *
     */
    protected $table = '';

    /**
     * Mass assign fields.
     *
     * @return array
     */
    protected $fillable = [];

    /**
     * Get the user for a ability.
     *
     * @return belongsToMany instance.
     */
    public function users()
    {
        return $this->belongsToMany()
            ->withTimestamps();
    }
}
