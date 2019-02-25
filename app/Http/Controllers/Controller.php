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
    public function home()
    {
        return view('content.home', [
            'title'     => 'Home - Fieldbinder'
        ]);
    }

    /**
     * ===================================================x
     * Pages of documentation and introdution to website
     * ===================================================x
     */
    public function guide()
    {
        return view('content.documentation.guide', [
            'title' => 'Guide - Fieldbinder'
        ]);
    }

    public function aboutUs()
    {
        return view('content.documentation.aboutUs', [
            'title' => 'About Us - Fieldbinder'
        ]);
    }

    /**
     * =======================================================x
     * Catalog of Spiecies
     * =======================================================x
     */
    public function catalog($niche, $page)
    {
        return view('content.catalog.catalog', [
            'title'     => 'Catalog - Fieldbinder',
        ]);
    }

    public function spiecie()
    {
        return view('content.catalog.spiecie', [
            'title' => 'Spiecie - Fieldbinder'
        ]);
    }

    /**
     * =======================================================x
     * Paths to user's featuries
     * =======================================================x
     */
    public function login(){

        return view('content.user.login', [
            'title' => 'Login - Fieldbinder'
        ]);
    }

    public function register()
    {
        return view('content.user.register', [
            'title' =>  'Register - Fieldbinder',
        ]);
    }

    public function profile()
    {
        return view('content.user.profiler', [
            'title' => 'Profile - Fieldbinder'
        ]);
    }

    /**
     * =======================================================x
     * Paths of the spiecies catalog
     * ==========================================s=============x
     */
    public function lister()
    {
        return view('content.catalog.lister', [
            'title' => 'Lister - Fieldbinder'
        ]);
    }

    /**
     * forum(?)
     */
}
