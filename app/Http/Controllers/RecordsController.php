<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RecordCreateRequest;
use App\Http\Requests\RecordUpdateRequest;
use App\Services\RecordService;

class RecordsController extends Controller
{
    protected $validator;

    public function __construct(RecordService $service)
    {
        $this->service  = $service;
    }

    public function index()
    {
        return redirect()->route('catalog.spiecies');
    }

    public function store(RecordCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $record = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message']
            ]);

        return redirect()->route('recods.index', [
            'messages'  =>  $record['message']
        ]);
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
        $request = $this->service->store($request->all());
        $record = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
            ]);

        return redirect()->route('record.index');
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
