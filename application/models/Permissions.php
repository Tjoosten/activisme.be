<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends Model
{
    /**
     * Database name
     *
     * @return string
     */
    protected $table = '';

    /**
     * Mass-assign fields.
     *
     * @return array
     */
    protected $fillable = [];

    public function users()
    {
        return $this->belongsToMany()
            ->withTimestamps();
    }
}
