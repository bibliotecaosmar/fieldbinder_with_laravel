<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RecordCreateRequest;
use App\Http\Requests\RecordUpdateRequest;
use App\Repositories\RecordRepository;
use App\Validators\RecordValidator;

class RecordsController extends Controller
{
    protected $repository;
    protected $validator;

    public function __construct(RecordRepository $repository, RecordValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $records = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $records,
            ]);
        }

        return view('records.index', compact('records'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RecordCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RecordCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $record = $this->repository->create($request->all());

            $response = [
                'message' => 'Record created.',
                'data'    => $record->toArray(),
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
        $record = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $record,
            ]);
        }

        return view('records.show', compact('record'));
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
        $record = $this->repository->find($id);

        return view('records.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RecordUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RecordUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $record = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Record updated.',
                'data'    => $record->toArray(),
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
                'message' => 'Record deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Record deleted.');
    }
}
