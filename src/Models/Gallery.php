<?php

namespace jorenvanhocht\Blogify\Models;


use Rutorika\Sortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Gallery extends BaseModel implements HasMedia
{

    use HasMediaTrait;
    use SortableTrait;

    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'gallery';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name'];


    public function mediaImage()
    {
        return $this->hasMany('jorenvanhocht\Blogify\Models\MediaImage', 'model_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($gallery)
        {
            $gallery->mediaImage()->get()->each(function ($media, $key)
            {
                $media->meta()->delete();
            });
        });
    }


}