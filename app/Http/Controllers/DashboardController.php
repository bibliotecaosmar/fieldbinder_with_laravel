<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Exceptions\FillerException;
use App\Services\DashboardService;
use Auth;
use Exception;

class DashboardController extends Controller
{
    private $repository;
    private $validator;
    private $exception;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository   = $repository;
        $this->validator    = $validator;
    }

    public function index()
    {
        return redirect()->route('home');
    }

    public function auth(Request $request, DashboardService $dash, FillerException $exception)
    {
        $data = [
            'email'    => $request->get('email'),
            'password' => $request->get('password')
        ];
        
        try
        {
            if(env('PASSWORD_HASH'))
            {
                Auth::attempt($data);
                return redirect()->route('user.dashboard');
            }
            $user = $this->repository->findWhere(['email' => $request->get('email')])->first();
            $message = $dash->manual($user, $data);
            if(isset($message))
                return redirect()->route('user.login', [
                    'messages'  =>  $messages
                ]);
            return redirect()->route('user.dashboard');     
        }
        catch(Exception $e)
        {
            return redirect()->route('user.login', [
                'error'   => $exception->leach($e)
            ]);
        }
    }
}
