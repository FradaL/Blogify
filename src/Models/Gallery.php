<?php

namespace jorenvanhocht\Blogify\Models;


use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Gallery extends BaseModel implements HasMedia
{

    use HasMediaTrait;
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



}