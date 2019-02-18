<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Entities\Spiecie;
use App\Entities\Record;

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
        'niche_id', 'name'
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

    public function record()
    {
        return $this->hasMany(Record::class);
    }
}
