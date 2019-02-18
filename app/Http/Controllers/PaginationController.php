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
        /*if(session('catalog')['success'])
        {
            session()->keep('catalog');

            redirect()->route('catalog.spiecies', [
                'niche'     => session('catalog')['niche'],
                'page'      => $page
            ]);
        }*/

        $model = $this->service->indexer($id, $page);
        $catalog = $model['success'] ? $model['catalog'] : null;

        session()->flash('catalog', [
            'success'   =>  $model['success'],
            'niche'     =>  $catalog['niche'],
            'catalog'   =>  $catalog['catalog']
        ]);

        return redirect()->route('catalog.spiecies', [
            'niche'     =>  $catalog['niche'],
            'page'      =>  $page
        ]);
    }
}
