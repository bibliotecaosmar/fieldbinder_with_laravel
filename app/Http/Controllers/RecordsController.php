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

    public function index()
    {
        //
    }

    public function store(RecordCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $record = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
            ]);

        return redirect()->route('spiecie.lister');
    }

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

    public function edit($id)
    {
        $record = $this->repository->find($id);

        return view('records.edit', compact('record'));
    }

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
