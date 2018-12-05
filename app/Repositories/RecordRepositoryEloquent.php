<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RecordRepository;
use App\Entities\Record;
use App\Validators\RecordValidator;

/**
 * Class RecordRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RecordRepositoryEloquent extends BaseRepository implements RecordRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Record::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RecordValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
