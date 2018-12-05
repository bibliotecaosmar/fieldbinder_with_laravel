<?php
    namespace App\Services;

    use Prettus\Validator\Contracts\ValidatorInterface;
    use App\Repositories\SpiecieRepository;
    use App\Validators\SpiecieValidator;

    class SpiecieService
    {
        private $repository;
        private $validator;

        public function __construct(SpiecieRepository $repository, SpiecieValidator $validator)
        {
            $this->repository = $repository;
            $this->validator  = $validator;
        }

        public function store(array $data)
        {
        
        }    
        
        public function update()
        {

        }
        public function delete()
        {
            
        }
    }