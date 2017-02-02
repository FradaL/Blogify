<?php

namespace jorenvanhocht\Blogify\Models;

use jorenvanhocht\Blogify\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metadata extends BaseModel
{

    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'metadata';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'location', 'media_id'];

    /**
     * Set or unset the timestamps for the model
     *
     * @var bool
     */
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | For more information pleas check out the official Laravel docs at
    | http://laravel.com/docs/5.0/eloquent#relationships
    |
    */

    public function mediaimage()
    {
        return $this->hasOne('jorenvanhocht\Blogify\Models\MediaImage', 'id', 'media_id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }




}