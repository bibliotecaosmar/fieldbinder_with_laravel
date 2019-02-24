<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;

class UploadImageController extends Controller
{
    private $service;

    public function __construct(UploadImageService $service)
    {
        $this->service = $service;
    }

    public function uploadProfile(Request $fileupload)
    {
        
    }

    public function uploadRecord(Request $fileupload)
    {

    }
}
