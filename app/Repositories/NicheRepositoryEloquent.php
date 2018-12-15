<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NicheRepository;
use App\Entities\Niche;
use App\Validators\NicheValidator;

/**
 * Class NicheRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NicheRepositoryEloquent extends BaseRepository implements NicheRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Niche::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return NicheValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
