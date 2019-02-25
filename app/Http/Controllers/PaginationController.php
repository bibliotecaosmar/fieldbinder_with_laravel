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

    public function indexer($id = 1, $page = 1)
    {
        $model = $this->service->indexer($id, $page);
        $catalog = $model['success'] ? $model['catalog'] : null;

        session()->put('catalog', [
            'success'   =>  $model['success'],
            'catalog'   =>  $catalog['catalog'],
            'niche'     =>  $catalog['niche'],
        ]);

        return redirect()->route('catalog.spiecies', [
            'niche'     =>  $catalog['niche']->name,
            'page'      =>  $page,
        ]);
    }
}
