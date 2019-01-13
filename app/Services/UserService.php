<?php
    namespace App\Services;

    use Prettus\Validator\Contracts\ValidatorInterface;
    use Prettus\Validator\Exceptions\ValidatorException;
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
            try
            {
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $user = $this->repository->create($data);
                return [
                    'success' => true,
                    'message' => "User registered",
                    'user'    => [
                        'id'            =>  $user->id,
                        'username'      =>  $user->nickname ?? $user->name
                    ]
                ];
            }
            catch(Exception $e)
            {
                return [
                    'success' => false,
                    'message' => 'Require failed'
                ];
            }
        }

        public function show($id)
        {
            try
            {
                $profile = $this->repository->find($id);

                return [
                    'success'   =>  true,
                    'data'      =>  $profile
                ];
            }
            catch (Exception $e)
            {
                return [
                    'success'   =>  false,
                    'messsage'  =>  'Require failed'
                ];
            }
        }

        public function edit($id)
        {
            try
            {
                $users = $this->repository->findAll();

                return [
                    'success'   => true,
                    'data'      => $users
                ];
            }
            catch (Exception $e)
            {
                return [
                    'success'   => false,
                    'message'   => 'Require failed'
                ];
            }
        }

        public function update($data)
        {
            try
            {
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

                $this->repository->update($data);

                return [
                    'success'   =>  true,
                    'message'   =>  'Success at update',
                ];
            }
            catch (Exception $e)
            {
                return [
                    'success'   =>  false,
                    'message'   =>  'Error at update'
                ];
            }
        }

        public function destroy($id)
        {
            try
            {
                $user = $this->repository->find($id)->get();

                $this->repository->delete($id);

                return [
                    'success'   => true,
                    'message'   => 'User ' . $user->nickname ?? $user->name . ' deleted'
                ];
            }
            catch (Exception $e)
            {
                return [
                    'success'   => false,
                    'message'   => 'Require failed'
                ];
            }
        }
    }
