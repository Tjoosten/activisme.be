<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The database table name.
     *
     * @return string
     */
    protected $table = 'articles';

    /**
     * Mass-assign fields.
     *
     * @return array
     */
    protected $fillable = ['author_id', 'title', 'message'];

    /**
     * The creator data relationship.
     *
     * @return belongsTo Instance.
     */
    public function creator()
    {
        return $this->belongsTo('Authencate', 'author_id');
    }
}
