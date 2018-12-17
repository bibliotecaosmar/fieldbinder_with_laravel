<?php
    namespace App\Services;

    use Prettus\Validator\Contracts\ValidatorInterface;
    use App\Repositories\RecordRepository;
    use App\Repositories\SpiecieRepository;
    use App\Validators\SpiecieValidator;
    use App\Validators\NicheValidator;
    use Exception;

    class SpiecieService
    {
        private $repository_spiecie;
        private $validator_spiecie;
        private $validator_niche;

        public function __construct(SpiecieRepository $repository_spiecie, SpiecieValidator $validator_spiecie, NicheValidator $validator_niche)
        {
            $this->repository_spiecie   = $repository_spiecie;
            $this->validator_spiecie    = $validator_spiecie;
            $this->validator_niche      = $validator_niche;
        }

        public function indexer($niche, $page)
        {
            $niche = ['niche' => $niche];

            try
            {
                $this->validator_niche->with($niche)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $model = $this->repository_spiecie->orderBy('id', 'desc')->skip(($page-1)*9)->take(9)->get();

                $catalog = [
                    'niche'     =>  $niche,
                    'page'      =>  $page,
                    'catalog'   =>  $model
                ];

                return [
                    'success'   =>  true,
                    'catalog'   =>  $model
                ];
            }
            catch(Exception $e)
            {
                return ['success' => false];
            }
        }

        public function store(array $data)
        {
            try{
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $user = $this->repository->create($data);

                return [
                    'success' => true,
                    'message' => "User registered",
                    'data'    => $user
                ];
            }catch(\Exception $e){
                switch(get_class($e))
                {
                    case QueryException::class      : return ['success' => false, 'messages' => $e->getMessage()];
                    case ValidatorException::class  : return ['success' => false, 'messages' => $e->getMessageBag()];
                    case Exception::class           : return ['success' => false, 'messages' => $e->getMessage()];
                    default                         : return ['success' => false, 'messages' => get_class($e)];
                }
                return [
                    'success' => false,
                    'message' => 'require failed'
                ];
            }
        }

        public function update()
        {

        }
        public function delete()
        {

        }
    }
