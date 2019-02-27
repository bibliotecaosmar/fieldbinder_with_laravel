<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Repositories\SpiecieRepository;

class UploadImageController extends Controller
{
    private $service;
    private $repository_spiecie;

    public function __construct(UploadImageService $service, SpiecieRepository $repository_spiecie)
    {
        $this->service              = $service;
        $this->repository_spiecie   = $repository_spiecie;
    }

    public function uploadUser(Request $request)
    {
        $id = session('auth')['id'];

        if($request->hasFile('uploadProfile') && $request->file('uploadProfile')->isValid())
        {
            $pic = $this->service->pic_user($id);

            if($pic)
            {
                $name = $pic['id'];
            }
            else
            {
                $name = $pic['user_id'].kebab_case($pic['user_name']);
                $this->service->register_user($name, $id);
            }

            $extension  = $request->uploadProfile->extension();
            $nameFile   = "{$name}.{$extension}";

            session()->flash('upload', $this->service
                ->messageSet()
                ->success($request->uploadProfile->storeAs('users', $nameFile));
        }
        return redirect('user.profile');
    }

    public function uploadLister(Request $request)
    {
        $name = $request->get('name');

        if($request->hasFile('uploadProfile') && $request->file('uploadProfile')->isValid())
        {
            $spiecie = $this->service->pic_spiecie($name);

            if($spiecie)
            {
                $name = $spiecie['pic_id'];
            }
            else
            {
                $name = $spiecie['record_id'].kebab_case($spiecie['name']);
                $this->service->register_record($name, $spiecie['id']);
            }

            $extension  = $request->uploadProfile->extension();
            $nameFile   = "{$name}.{$extension}";

            session()->flash('upload', $this->service
                ->messageSet()
                ->success($request->uploadProfile->storeAs('record', $nameFile));
        }
        return redirect('catalog.lister');
    }
}
