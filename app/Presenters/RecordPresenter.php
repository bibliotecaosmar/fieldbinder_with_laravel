<?php

namespace App\Presenters;

use App\Transformers\RecordTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RecordPresenter.
 *
 * @package namespace App\Presenters;
 */
class RecordPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RecordTransformer();
    }
}
