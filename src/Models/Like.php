<?php

namespace jorenvanhocht\Blogify\Models;

use Auth;
use jorenvanhocht\Blogify\Models\Tag;
use jorenvanhocht\Blogify\Models\Media;
use jorenvanhocht\Blogify\Models\Status;
use jorenvanhocht\Blogify\Models\Comment;
use jorenvanhocht\Blogify\Models\Category;
use jorenvanhocht\Blogify\Models\Visibility;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends BaseModel
{

    /**
     * The database table used by the model
     *
     * @var string
     */


    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['address_ip'];

    /**
     * Set or unset the timestamps for the model
     *
     * @var bool
     */
    public $timestamps = true;

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | For more information pleas check out the official Laravel docs at
    | http://laravel.com/docs/5.0/eloquent#relationships
    |
    */

    public function likeable()
    {
        return $this->morphTo();
    }

}