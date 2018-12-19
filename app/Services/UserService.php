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
                    'data'    => $user
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

        public function show($data, $id)
        {
            try
            {
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

                //password = database_password ? continue : fail;

                $data = $this->repository->update($data, $id);

                return [
                    'success'   =>  true,
                    'message'   =>  'User updated',
                    'data'      =>  $data
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

        public function destroy($id, $password)
        {
            try
            {
                //password = database_password ? continue : fail;
                $this->repository->delete($id)

                $email = $this->repository->findWhere('id' = $id, 'email');

                return [
                    'success'   => true,
                    'message'    => 'User ' . $email . ' deleted'
                ];
            }
            catch (\Exception $e)
            {
                return [
                    'success'   => false,
                    'message'   => 'Require failed'
                ];
            }
        }
    }
