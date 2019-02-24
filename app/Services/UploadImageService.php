<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\RecordRepository;

class UploadImageService
{
    private $repository_user;
    private $repository_record;

    public function __construct(UserRepository $repository_user,
                                RecordRepository $repository_record)
    {
        $this->repository_user      = $repository_user;
        $this->repository_record    = $repository_record;
    }

    public function upload()
    {

    }

    public function download()
    {
        
    }
}
