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

    public function uploadProfile(Request $request)
    {
        $user       = session('auth')

        if($request->hasFile('uploadProfile') && $request->file('uploadProfile')->isValid())
        {
            $pic = $this->service->pic();

            if($pic)
            {
                $name = $pic['id'];
            }
            else
            {
                $name = $pic['user_id'].kebab_case($pic['user_name']);
                $this->service->register($name);
            }

            $extension  = $request->uploadProfile->extension();
            $nameFile   = "{$name}.{$extension}";

            $upload = $request->uploadProfile->storeAs('users', $nameFile);

            if(!$upload)
            {
                session()->flash('success', [
                    'success'   => false,
                    'message'   => 'Not was possible send your picture.'
                ]);

                return redirect('user.profile');
            }

            session()->flash('success', [
                'success'   => true,
                'message'   => 'Upload successfully concluded.'
            ]);
        }
    }

    public function uploadRecord(Request $request)
    {
        $request    = $request->input('uploadLister');

    }
}
