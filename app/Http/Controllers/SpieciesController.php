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

    public function index()
    {
        return redirect()->route('catalog.spiecies');
    }

    public function indexer($id, $page = 1)
    {
        $model = $this->service->indexer($id, $page);
        $catalog = $model['success'] ? $model['catalog'] : null;

        session()->flash('catalog', [
            'success'   =>  $model['success'],
            'niche'     =>  $catalog['niche'],
            'page'      =>  $catalog['page'],
            'catalog'   =>  $catalog['catalog']
        ]);

        return redirect()->route('catalog.spiecies', [
            'niche'     =>  $catalog['niche'],
            'page'      =>  $page
        ]);
    }

    public function store(SpiecieCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $user = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
                            'success' => $request['success'],
                            'message' => $request['message'],
                            ]);

        return redirect()->route('user.dashboard', ['auth'  =>  $credentials]);
    }

    public function show($id)
    {
        $spiecie = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $spiecie,
            ]);
        }

        return view('spiecies.show', compact('spiecie'));
    }

    public function edit($id)
    {
        $spiecie = $this->repository->find($id);

        return view('spiecies.edit', compact('spiecie'));
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
