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

        public function __construct(SpiecieRepository $repository,
                                    SpiecieValidator $validator)
        {
            $this->repository       = $repository;
            $this->validator        = $validator;
        }

        private function pagination($model, $page)
        {
            $size = count($model);

            for($i = 0;$i < 9;$i++)
            {
                $aux    = $size - ($i + (9*($page - 1))));
                $result = $model[$aux];
            }
            return $result;
        }

        public function indexer($id, $page)
        {
            try
            {
                $model = $this->repository->findWhere(['niche_id' => $id]);

                $model = $this->pagination($model, $page);

                $catalog = [
                    'niche'     =>  $model[0]->niche->name,
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
                return [
                    'success'   => false,
                    'niche'     => $niche->name ?? -1
                ];
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
