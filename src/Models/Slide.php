<?php

namespace jorenvanhocht\Blogify\Models;



use Rutorika\Sortable\SortableTrait;

class Slide extends BaseModel
{

    use SortableTrait;
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