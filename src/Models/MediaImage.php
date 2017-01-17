<?php

namespace jorenvanhocht\Blogify\Models;




use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;



use Spatie\MediaLibrary\SortableTrait;

class MediaImage extends BaseModel implements HasMedia
{

    use HasMediaTrait;
    use SortableTrait;

    /**
     * The database table used by the model
     *
     * @var string
     */

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    protected $table = 'media';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [];

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

    public function gallery()
    {
        return $this->hasOne('jorenvanhocht\Blogify\Models\Gallery', 'id', 'model_id');
    }

    public function data()
    {
        return $this->hasOne('jorenvanhocht\Blogify\Models\Gallery', 'media_id');
    }

    public function meta()
    {
        return $this->hasOne('jorenvanhocht\Blogify\Models\Metadata', 'media_id');
    }




}