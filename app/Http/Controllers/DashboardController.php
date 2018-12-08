<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Auth;
use Exception;

class DashboardController extends Controller
{
    private $repository;
    private $validator;
    private $messages = [];

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        return redirect()->route('home');
    }

    public function auth(Request $request)
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
                
            if($user->email !== $request->get('email'))
                array_push($this->messages, "invalid email");
            if($user->password !== $request->get('password'))
                array_push($this->messages, "invalid password");

            if(isset($this->messages[0]))
                return redirect()->route('user.login', [
                    'messages'  =>  $this->messages
                ]);
            return redirect()->route('user.dashboard');            
        }
        catch(Exception $e)
        {
            return redirect()->route('user.login', [
                'error'   => $e->getMessage()
            ]);
        
        }
    }
}
