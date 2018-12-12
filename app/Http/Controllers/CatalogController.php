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
    
    public function index()
    {
        return redirect()->route('content.catalog.catalog');
    }
}
