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
     * User permissions data relation
     *
     * @return BelongsToMany instance
     */
    public function permissions()
    {
        return $this->belongsToMany('Permissions', 'login_permissions', 'login_id', 'permission_id')
            ->withTimestamps();
    }
    /**
     * User abilities data relation.
     *
     * @return BelongsToMany instance
     */
    public function abilities()
    {
        return $this->belongsToMany('Abilities', 'login_abilities', 'login_id', 'ability_id')
            ->withTimeStamps();
    }
}
