<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Auth;

class DashboardService
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository   = $repository;
        $this->validator    = $validator;
    }

    public function auth(array $data)
    {
        try
        {
            if(env('PASSWORD_HASH'))
            {
                Auth::attempt($data, false);
                $data = ['email' => $data['email']];
                $user = $this->repository->findWhere($data)->first();

                return [
                    'success'       => true,
                    'message'       => 'logged',
                    'user'          => $user
                ];
            }
            $user = $this->repository->findWhere($data)->first();

            if($user->email !== $data['email'])
            {
                array_push($messages, 'Invalid email');
            }
            if($user->password !== $data['password'])
            {
                array_push($messages, 'Invalid password');
            }

            if(isset($messages))
            {
                return [
                    'success' => false,
                    'message' => $messsages
                ];
            }

            return [
                'success'   =>  true,
                'message'   =>  'logged',
                'username'  =>  $user->nickname ?? $user->name
            ];
        }
        catch(Exception $e)
        {
            return [
                'success'   => false,
                'message'  => $e->getMessageBag()
            ];
        }
    }
}
