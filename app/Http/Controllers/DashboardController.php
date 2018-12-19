<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Auth;
use Exception;

class DashboardController extends Controller
{
    private $repository;
    private $validator;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return redirect()->route('home');
    }

    public function auth(Request $request)
    {

        try
        {
            if(env('PASSWORD_HASH'))
            {
                Auth::attempt($data, false);
                return redirect()->route('user.dashboard');

            }
            $user = $this->repository->findWhere($request->all)->first();

            if($user->email !== $data['email'])
                array_push($messages, 'Invalid email');
            if($user->password !== $data['password'])
                array_push($messages, 'Invalid password');

            if(isset($messages))
            {
                session()->flash('success', [
                    'success' => false,
                    'message' => $messsages
                ]);

                return redirect()->route('user.login');
            }

            session()->flash('success', [
                'success'   =>  true,
                'username'  =>  $user->nickname ?? $user->name
            ]);

            return redirect()->route('user.dashboard');
        }
        catch(Exception $e)
        {
            session()->flash([
                'success'   => false,
                'messages'  => $e->getMessageBag()
            ]);

            return redirect()->route('user.login);
        }
    }
}
