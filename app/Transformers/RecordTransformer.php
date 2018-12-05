<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Record;

/**
 * Class RecordTransformer.
 *
 * @package namespace App\Transformers;
 */
class RecordTransformer extends TransformerAbstract
{
    /**
     * Transform the Record entity.
     *
     * @param \App\Entities\Record $model
     *
     * @return array
     */
    public function transform(Record $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
