<?php
    namespace App\Services;

    use Prettus\Validator\Contracts\ValidatorInterface;
    use App\Repositories\RecordRepository;
    use App\Repositories\SpiecieRepository;
    use App\Validators\SpiecieValidator;
    use Exception;

    class SpiecieService
    {
        private $repository;
        private $validator;

        public function __construct(SpiecieRepository $repository, SpiecieValidator $validator)
        {
            $this->repository   = $repository;
            $this->validator    = $validator;
        }

        public function indexer($id, $page)
        {
            try
            {
                $model = $this->repository->orderBy('id', 'DESC')
                                          ->skip(($page - 1) * 9)
                                          ->take(9)
                                          ->with(['niche_id' => $id]);

                $catalog = [
                    'niche'     =>  $model->niche_id->niche,
                    'page'      =>  $page,
                    'catalog'   =>  $model
                ];

                return [
                    'success'   =>  true,
                    'catalog'   =>  $catalog
                ];
            }
            catch(Exception $e)
            {
                return ['success' => false];
            }
        }

        public function store(array $data)
        {
            try
            {
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $user = $this->repository->create($data);

                return [
                    'success' => true,
                    'message' => "User registered",
                    'data'    => $user
                ];
            }
            catch(Exception $e)
            {
                return [
                    'success' => false,
                    'message' => 'require failed'
                ];
            }
        }
    }
