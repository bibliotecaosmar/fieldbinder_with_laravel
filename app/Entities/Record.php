<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Record.
 *
 * @package namespace App\Entities;
 */
class Record extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'spiecie_id', 'spiecie', 'niche_id', 'habitat', 'common_name', 'pic_id'
    ];

    protected $hidden = ['spiecie_id'];

    public function users()
    {
        return $this->belongTo(User::class);
    }

}
