<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;

class UsersController extends Controller
{
    protected $service_user;
    protected $service_dashboard;

    public function __construct(UserService $service_user, DashboardService $service_dashboard)
    {
        $this->service_user         = $service_user;
        $this->service_dashboard    = $service_dashboard;
    }

    public function index()
    {
        return redirect()->route('user.show', $id);
    }

    public function store(UserCreateRequest $request)
    {
        $request    = $this->service_user->store($request->all());
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
        if(session('auth')['success'])
        {
            $profile    = $this->service_user->show($id);
            $user       = $profile['success'] ? $profile['data'] ? null;

            session()->flash('profile', [
                'user'      =>  $user
            ]);

            return $profile['success'] ? redirect()->route('user.profile') : redirect()->route('not.found');
        }

        session()->flash([
            'success'   =>  false,
            'messsage'  =>  'Action not avoid'
        ]);

        return redirect()->route('not.found');
    }

    public function edit($id)
    {
        if(session('auth')['success'])
        {
            $edit = $this->service_user->edit($request->all());
            $panel = $edit['success'] ? $edit['data'] : null;

            session()->flash('panel', [
                'success'   =>  $edit['success'],
                'panel'     =>  $panel
            ])

            return redirect()->route('catalog.manager');
        }

        session()->flash([
            'success'   =>  false,
            'messsage'  =>  'Action not avoid'
        ]);

        return redirect()->route('not.found');
    }

    public function update(UserUpdateRequest $request, $id)
    {
        if($this->service_dashboard->auth()['success'])
        {
            $update = $this->service_user->show($request, $id);
            $user   = $update['success'] ? $update['data'] : null;

            session()->flash([
                'success'   => true,
                'message'   => $update['message'],
                'user'      => $user
            ]);

            return redirect()->route('user.profile');
        }

        session()->flash([
            'success'   =>  false,
            'messsage'  =>  'Action not avoid'
        ]);

        return redirect()->route('not.found');
    }

    public function destroy($id)
    {
        if($this->service_dashboard->auth()['success'])
        {
            $deleted = $this->service_user->destroy($id, $password);

            session()->flash([
                'success'       => $deleted['success'],
                'message'       => $deleted['message']
            ]);

            return redirect()->route('home');
        }

        session()->flash([
            'success'   =>  false,
            'messsage'  =>  'Action not avoid'
        ]);

        return redirect()->route('not.found');
    }
}
