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

        public function getCatalog($niche)
        {
            try
            {
                
            }
            catch(Exception $e)
            {

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