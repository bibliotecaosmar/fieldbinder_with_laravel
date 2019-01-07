<?php
namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Repositories\RecordRepository;
use App\Validators\RecordValidator;
use Exception;

class RecordService
{
    public $repository;
    public $validator;

    public function __contruct(RecordRepository $repository, RecordValidator $validator)
    {
        $this->repository   = $repository;
        $this->validator    = $validator;
    }

    public function store(array $data)
    {
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $record = $this->repository->create($data);
            return [
                'success' => true,
                'message' => "record listed",
                'data'    => $record
            ];
        }catch(\Exception $e){

            return [
                'success' => false,
                'message' => 'Error on execution'
            ];

        }
    }

    public function update(array $data)
    {
        try {

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

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

    public function show()
    {

    }

    public function edit()
    {

    }
}
