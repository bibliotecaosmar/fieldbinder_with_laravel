<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaginationService;

class PaginationController extends Controller
{
    private $service;

    public function __construct(PaginationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return redirect()->route('catalog.spiecies');
    }

    public function indexer($id, $page = 1)
    {
        // if(session('catalog')['success'] ?? 0)
        // {
        //     redirect()->route('catalog.spiecies', [
        //         'niche'     => session('catalog')['niche']->name,
        //         'page'      => $page
        //     ]);
        // }

        $model = $this->service->indexer($id, $page);
        $catalog = $model['success'] ? $model['catalog'] : null;

        session()->put('catalog', [
            'success'   =>  $model['success'],
            'catalog'   =>  $catalog['catalog'],
            'niche'     =>  $catalog['niche'],
            'page'      =>  $page
        ]);

        return redirect()->route('catalog.spiecies', [
            'niche'     =>  $catalog['niche']->name,
            'page'      =>  $page,
        ]);
    }
}
