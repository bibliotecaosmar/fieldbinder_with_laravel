<?php
    namespace App\Services;

    use Prettus\Validator\Contracts\ValidatorInterface;
    use App\Repositories\UserRepository;
    use App\Validators\UserValidator;
    use Exception;

    class UserService
    {
        private $repository;
        private $validator;

        public function __construct(UserRepository $repository, UserValidator $validator)
        {
            $this->repository   = $repository;
            $this->validator    = $validator;
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
                return [
                    'success' => false,
                    'message' => 'require failed'
                ];
            }
        }

        public function show()
        {
            
        }

        public function update()
        {

        }
        public function delete()
        {

        }
    }
