<?php

namespace jorenvanhocht\Blogify\Models;


use Rutorika\Sortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Services extends BaseModel implements Hasmedia, HasMediaConversions
{

    use HasMediaTrait;

    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'slug'];


    public function mediaImage()
    {
        return $this->hasMany('jorenvanhocht\Blogify\Models\MediaImage', 'model_id');
    }

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 81, 'h' => 81])
            ->performOnCollections();
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($service)
        {
            $service->mediaImage()->get()->each(function ($media, $key)
            {
                $media->delete();
            });
        });
    }


}