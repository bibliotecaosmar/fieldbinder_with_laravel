<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Services\DashboardService;
use Auth;
use Exception;

class DashboardController extends Controller
{
    private $service;

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
        $login   = [
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        ];

        $auth   = $this->service->auth($login);
        $user   = $auth['success'] ? $auth['user'] : null;

        session()->put('auth', $user);

        session()->flash('login', [
            'success'   => $auth['success'],
            'message'   => $auth['message']
        ]);

        return $auth['success'] ? redirect()->route('user.dashboard') : redirect()->route('user.login');
    }

    public function logoff()
    {
        session('auth') ? session()->forget('auth') : null;

        redirect()->route('pagination.indexer');
    }
}
