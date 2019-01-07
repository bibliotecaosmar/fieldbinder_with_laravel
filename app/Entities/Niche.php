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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table    = 'niches';
    protected $fillable = ['niche_id', 'niche'];

    public function spiecies()
    {
        return $this->hasMany(Spiecie::class);
    }

}
