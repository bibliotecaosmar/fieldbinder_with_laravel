<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Niche.
 *
 * @package namespace App\Entities;
 */
class Niche extends Model implements Transformable
{
    use TransformableTrait;

    public $table       = 'niches';
    public $timestamps  = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'niche_id', 'niche'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden   = [];

    public function spiecie()
    {
        return $this->hasMany(Spiecie::class);
    }

}
