<?php

namespace jorenvanhocht\Blogify\Models;


class Gallery extends BaseModel
{

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