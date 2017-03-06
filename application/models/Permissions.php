<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

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
