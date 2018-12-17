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
        private $repository;
        private $validator;

        public function __construct(SpiecieRepository $repository, SpiecieValidator $validator, NicheValidator $validator_niche)
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
                $this->validator_niche->with($niche)->passesOrFail(ValidatorInterface::RULE_MODEL);
                $model = $this->repository->orderBy('id', 'desc')->skip(($page-1)*9)->take(9)->get();

                return [
                    'niche'     =>  $niche,
                    'page'      =>  $page,
                    'catalog'   =>  $model
                ];
            }
            catch(Exception $e)
            {
                return [
                    'niche' => $niche,
                    'catalog' => 'Nothing found'
                ];
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
