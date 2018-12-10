<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SpiecieCreateRequest;
use App\Http\Requests\SpiecieUpdateRequest;
use App\Repositories\SpiecieRepository;
use App\Validators\SpiecieValidator;

class SpieciesController extends Controller
{
    protected $service;

    public function __construct(SpiecieService $service)
    {
        $this->service  = $service;
    }

    public function index()
    {
        return redirect()->route('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SpiecieCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SpiecieCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $spiecie = $this->repository->create($request->all());

            $response = [
                'message' => 'Spiecie created.',
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spiecie = $this->repository->find($id);

        return view('spiecies.edit', compact('spiecie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SpiecieUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
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
