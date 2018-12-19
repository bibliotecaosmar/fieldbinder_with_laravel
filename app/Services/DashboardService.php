<?php

namespace App\Services;

class DashboardService
{
    private $repository;
    private $validator;

    public function __construct(DashboardService $service)
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
                Auth::attempt($data, false);
                $user = $this->repository->findWhere($data)->first();

                return [
                    'success'   => true,
                    'username'  => $user->nickname ?? $user->name
                ];
            }
            $user = $this->repository->findWhere($data)->first();

            if($user->email !== $data['email'])
                array_push($messages, 'Invalid email');
            if($user->password !== $data['password'])
                array_push($messages, 'Invalid password');

            if(isset($messages))
            {
                return [
                    'success' => false,
                    'message' => $messsages
                ]);
            }

            return [
                'success'   =>  true,
                'username'  =>  $user->nickname ?? $user->name
            ]);
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
