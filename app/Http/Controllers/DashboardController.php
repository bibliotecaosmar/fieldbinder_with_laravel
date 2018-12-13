<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DashboardService;

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
        $request = $this->service->auth($request->all());
        $user = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'   =>  $request['sucess'],
            'message'   =>  $request['message'],
        ]);
        
        return $request['success'] ? redirect()->route('user.dashboard') : redirect()->route('user.login');
    }
}
