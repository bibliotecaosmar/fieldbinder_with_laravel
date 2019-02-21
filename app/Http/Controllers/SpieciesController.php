<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SpiecieCreateRequest;
use App\Http\Requests\SpiecieUpdateRequest;
use App\Services\SpiecieService;

class SpieciesController extends Controller
{
    protected $service;

    public function __construct(SpiecieService $service)
    {
        $this->service  = $service;
    }

    public function index($niche, $page)
    {
        return redirect()->route('catalog.spiecies');
    }

    public function store(SpiecieCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $store = $request['success'] ? $request['data'] : null;

        session()->flash('store', [
                            'success' => $request['success'],
                            'message' => $request['message'],
                            ]);

        return redirect()->route('catalog.spiecies');
    }

    public function show($id)
    {
        $show       = $this->service->show($id);
        $spiecie    = $show['success'] ? $show['spiecie'] : null;

        session()->flash('spiecie', [
            'success' => $show['success'],
            'niche'   => $show['niche'],
            'spiecie' => $spiecie
        ]);

        return redirect()->route('catalog.info', [
            'niche'     => $show['niche'],
            'spiecie'   => $spiecie->name
        ]);
    }

    public function edit($id)
    {
        $spiecie = $this->service->edit($id);
    }

    public function update(SpiecieUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $spiecie = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Spiecie updated.',
                'data'    => $spiecie->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Spiecie deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Spiecie deleted.');
    }
}
