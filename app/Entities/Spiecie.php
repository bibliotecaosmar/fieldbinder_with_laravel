<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Spiecie.
 *
 * @package namespace App\Entities;
 */
class Spiecie extends Model implements Transformable
{
    use TransformableTrait;

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'spiecie', 
        'niche', 
        'habitat', 
        'common_name', 
        'pic_id', 
        'authors'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'pic_id'
    ];
}
