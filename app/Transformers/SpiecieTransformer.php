<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Spiecie;

/**
 * Class SpiecieTransformer.
 *
 * @package namespace App\Transformers;
 */
class SpiecieTransformer extends TransformerAbstract
{
    /**
     * Transform the Spiecie entity.
     *
     * @param \App\Entities\Spiecie $model
     *
     * @return array
     */
    public function transform(Spiecie $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
