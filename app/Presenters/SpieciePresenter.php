<?php

namespace App\Presenters;

use App\Transformers\SpiecieTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SpieciePresenter.
 *
 * @package namespace App\Presenters;
 */
class SpieciePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SpiecieTransformer();
    }
}
