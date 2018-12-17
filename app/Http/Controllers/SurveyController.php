<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RecordRepository;
use App\Validators\RecordValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Auth;
use Exception;

class SurveyController extends Controller
{

    public function __construct()
    {
        $this->repository   = $repository;
        $this->validator    = $validator;
    }

    public function vote(Request $request)
    {

    }
}
