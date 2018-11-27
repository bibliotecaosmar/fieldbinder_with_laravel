<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * ==========================================
     * Homepage
     * ==========================================
     */
    public function home(){
        return view('content.home', [
            'title' => 'home'
            ]);
        }

    /**
     * ===================================================x
     * Pages of documentation and introdution to website
     * ===================================================x
     */
    public function guide(){
        return view('content.documentation.guide');
    }

    public function ourproposal(){
        return view('content.documentation.ourproposal');
    }

    /**
     * =======================================================x
     * Paths to user's featuries
     * =======================================================x
     */
    public function login()
    {
        return view('content.user.login', [
            'title' => 'login'
        ]);
    }
    
    public function register()
    {
        return view('content.user.register');        
    }

    public function profile()
    {
        return view('content.user.profile');
    }

    /**
     * =======================================================x
     * Paths of the spiecies catalog
     * =======================================================x
     */
    public function plant()
    {
        return view('content.catalog.plant');
    }

    public function animal()
    {
        return view('content.catalog.animal');
    }
    public function insect()
    {
        return view('content.catalog.insect');
    }
    public function mushroom()
    {
        return view('content.catalog.mushroom');
    }

    public function spicieInfo()
    {
        return view('content.spiecieInfo');        
    }

    /**
     * forum(?)
     */
}
