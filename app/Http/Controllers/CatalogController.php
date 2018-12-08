<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SpiecieRepository;
use App\Repositories\RecordRepository;

class CatalogController extends Controller
{
    private $repository;
    private $validator;

    public function __construct(SpiecieRepository $repository_spiecie, RecordRepository $repository_record)
    {
        $this->repository_spiecie = $repository_spiecie;
        $this->repository_record  = $repository_record;
    }
    
    public function index(Request $request)
    {
        $niche = $request->get('niche');
        $catalog = $this->repository_spiecie;
        
        return view('content.catalog.catalog', [
            'title'     =>  'catalog',
            'niche'     =>  $spiecie,
            'catalog'   =>  $spiecie
        ]);
    }

    public function catalog(Request $request)
    {
        $this->repository_spiecie->show();
        $this->repository_spiecie = [
            'niche'     =>  $request->get('niche') ?? 'plant',
            'page'      =>  $request->get('page') ?? 1,
            'catalog'   =>  $spiecie
        ];


    }
}
