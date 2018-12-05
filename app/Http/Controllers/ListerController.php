<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RecordRepository;
use App\Validators\RecordValidator;
use Auth;
use Exception;

class ListerController extends Controller
{
    private $repository;
    private $validator;

    public function __construct(RecordRepository $repository, RecordValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function submit()
    {
        try
        {
            redirect()->route('catalog.index');
        }
        catch(Exception $e)
        {
            redirect()->route('record.index');
        }
    }
}
