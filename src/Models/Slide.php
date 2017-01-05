<?php

namespace jorenvanhocht\Blogify\Models;



class Slide extends BaseModel
{

    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'slide';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['source'];

    public $timestamps = false;


}