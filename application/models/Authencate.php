<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class Authencate extends Model
{
    /**
     * Database table name
     *
     * @return string
     */
    protected $table = 'users';

    /**
     * Mass-assign fields.
     *
     * @return array
     */
    protected $fillable = ['', ''];

    /**
     * Permissions for the given user.
     *
     * @return Collection|QueryBuilder
     */
    public function permissions()
    {
        return $this->belongsToMany('Permissions', '', '', '')
            ->withTimestamps();
    }

    /**
     * Abilities relation for the given user.
     *
     * @return Collection|QueryBuilder
     */
    public function abilities()
    {
        return $this->belongsToMany('Abilities', '', '', '')
            ->withTimestamps();
    }
}
