<?php
    namespace App\Services;

    use App\Repositories\RecordRepository;
    use App\Validators\RecordValidator;
    use Prettus\Validator\Contracts\ValidatorInterface;
    use Auth;
    use Exception;

    class SurveyService
    {
        private $repository;
        private $validator;

        public function __construct(RecordRepository $repository, RecordValidator $validator)
        {
            $this->repository   = $repository;
            $this->validator    = $validator;
        }

        public function vote()
        {
            
        }
    }
    
