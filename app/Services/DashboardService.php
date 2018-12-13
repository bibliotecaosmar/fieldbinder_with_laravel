<?php
    namespace App\Services;

    use App\Repositories\UserRepository;
    use App\Validators\UserValidator;
    use Prettus\Validator\Contracts\ValidatorInterface;
    use Auth;
    use Exception;
    
    class DashboardService
    {
        private $repository;
        private $validator;

        public function __construct(UserRepository $repository, UserValidator $validator)
        {
            $this->repository   = $repository;
            $this->validator    = $validator;
        }

        public function auth($data)
        {
            try
            {
                if(env('PASSWORD_HASH'))
                {
                    Auth::attempt($data);
                    return [
                        'success'   => true,
                        'message'   => 'logged',
                        'data'      => $data
                    ];
                }
                $user = $this->repository->findWhere(['email' => $data['email']])->first();
                
                if($user->email !== $data['email'])
                    array_push($messages, 'Invalid email');
                if($user->password !== $data['password'])
                    array_push($messages, 'Invalid password');
                
                if(isset($messages[0]))
                {
                    return [
                        'success' => false,
                        'message' => $messsages
                    ];
                }

                return [
                    'success'   => true,
                    'message'   => 'logged',
                    'data'      => $data
                ];
            }
            catch(Exception $e)
            {
                //for implement
                /*
                    return redirect()->route('user.login)
                */
                
                //provisor
                switch(get_class($e))
                {
                    case QueryException::class      : return ['success' => false, 'messages' => $e->getMessage()];
                    case ValidatorException::class  : return ['success' => false, 'messages' => $e->getMessageBag()];
                    case Exception::class           : return ['success' => false, 'messages' => $e->getMessage()];
                    default                         : return ['success' => false, 'messages' => get_class($e)];
                }
            }
        }
    }
    