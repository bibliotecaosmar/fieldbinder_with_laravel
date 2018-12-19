<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;

class UsersController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service  = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return redirect()->route('user.show', $id);
    }

    public function store(UserCreateRequest $request)
    {
        $request    = $this->service->store($request->all());
        $user       = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
                            'success'   => $request['success'],
                            'message'   => $request['message'],
                            'user'      => $user
                            ]);

        return redirect()->route('dashboard.auth');
    }

    public function show($id)
    {
        $profile    = $this->service->show($id);
        $user       = $profile['success'] ? $profile['data'] ? null;

        session()->flash('profile', [
            'success'   =>  $profile['success'],
            'user'      =>  $user
        ])

        return redirect()->route('user.profile');
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $update = $service->show($request, $id);
        $user   = $update['success'] ? $update['data'] : null;

        session()->flash([
            'success'   => true,
            'message'   => $update['message'],
            'user'      => $user
        ]);

        return redirect()->route('user.profile');
    }

    public function destroy($id, $password)
    {
        $deleted    = $this->service->delete($id, $password);

        session()->flash([
            'success'       => $deleted['success'],
            'message'       => $deleted['message']
        ]);

        return redirect()->route('home');
    }
}
