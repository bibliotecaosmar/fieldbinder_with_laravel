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
        $auth       = $this->service->auth($request->all());
        $username   = $auth['success'] ? $auth['data'] : null;

        session('auth', [
            'id'        => $username['id'],
            'username'  => $username['username']
        ]);

        session()->flash('success', [
            'success'   => $auth['success'],
            'message'   => $auth['message'],
        ]);

        return $auth['success'] ? redirect()->route('user.dashboard') : redirect()->route('user.login');
    }

    public function logoff()
    {
        
    }
}
