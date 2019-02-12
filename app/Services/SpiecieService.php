<?php
    namespace App\Services;

    use Prettus\Validator\Contracts\ValidatorInterface;
    use App\Repositories\RecordRepository;
    use App\Repositories\SpiecieRepository;
    use App\Validators\SpiecieValidator;
    use App\Entities\Niche;
    use Exception;

    class SpiecieService
    {
        private $repository;
        private $validator;
        private $repository_niche;

        public function __construct(SpiecieRepository $repository,
                                    SpiecieValidator $validator,
                                    Niche $repository_niche)
        {
            $this->repository       = $repository;
            $this->repository_niche = $repository_niche;
            $this->validator        = $validator;
        }

        public function indexer($id, $page)
        {
            try
            {
                $model = $this->repository->findWhere(['niche_id' => $id]);
                $niche = $this->repository_niche->findWhere(['id' => $id]);
                dd($niche);
                $catalog = [
                    'niche'     =>  $niche->name,
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
