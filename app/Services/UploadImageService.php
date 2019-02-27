<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\SpiecieRepository;
use App\Repositories\RecordRepository;
use App\Services\UserService;
use App\Services\SpiecieService;

class UploadImageService
{
    public $success;
    public $upload = [
        'true'  => 'Not was possible send your picture.'
        'false' => 'Upload successfully concluded.'
    ];
    private $repository_user;
    private $repository_record;

    public function __construct(UserRepository $repository_user,
                                RecordRepository $repository_record)
    {
        $this->repository_user      = $repository_user;
        $this->repository_record    = $repository_record;
    }

    public function success($data = 0)
    {
        if($data != 0)
            $this->success = [
                'success' => true,
                'result'  => 'true'
            ];
        $this->success = [
            'success' => false,
            'result'  => 'false'
        ];
    }

    public function messageSet()
    {
        return [
            'success'   => $this->success,
            'message'   => $this->upload[$success['result']];
        ]);
    }

    public function pic_user($id)
    {
        try
        {
            $pic_id = $this->repository_user->find('id', $id)->pic_id
            return [
                'success'   = true,
                'pic'       = $pic_id
            ];
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function pic_spiecie($name)
    {
        try
        {
            $spiecie = $this->repository_spiecie->find('name', $name);

            return [
                'success'   = true,
                'id'        = $spiecie->id
                'pic_id'    = $spiecie->pic_id,
                'name'      = $name
            ];
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function register_user($name, $id)
    {
        try
        {
            $register = $this->repository_user->update(['pic_id' => $name], $id)

            return [
                'success'   => true,
                'register'  => $register
            ];
        }
        catch(Exception $e)
        {
            return [
                'success'   => false,
                'message'   => 'Process failed.'
            ]
        }
    }

    public function register_record($name, $id)
    {
        try
        {
            $register = $this->repository_record->update(['pic_id' => $name], $id);

            return [
                'success'   => true,
                'register'  => $register
            ];
        }
        catch(Exception $e)
        {
            return [
                'success'   => false,
                'message'   => 'Process failed.'
            ]
        }
    }
}
