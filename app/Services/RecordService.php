<?php
    namespace App\Services;

    use Prettus\Validator\Contracts\ValidatorInterface;
    use App\Repositories\RecordRepository;
    use App\Validators\RecordValidator;

    class RecordService
    {
        public $repository;
        public $validator;

        public function __contruct(RecordRepository $repository, RecordValidator $validator)
        {
            $this->repository = $repository;
            $this->validator = $validator;
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
    }
