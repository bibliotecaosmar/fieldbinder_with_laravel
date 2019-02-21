<?php
    namespace App\Services;

    use Prettus\Validator\Contracts\ValidatorInterface;
    use App\Repositories\RecordRepository;
    use App\Repositories\SpiecieRepository;
    use App\Repositories\NicheRepository;
    use App\Validators\SpiecieValidator;
    use Exception;

    class SpiecieService
    {
        private $repository;
        private $validator;

        public function __construct(SpiecieRepository $repository,
                                    NicheRepository $repository_niche,
                                    SpiecieValidator $validator)
        {
            $this->repository       = $repository;
            $this->repository_niche = $repository_niche;
            $this->validator        = $validator;
        }

        public function store(array $data)
        {
            try
            {
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $spiecie = $this->repository->create($data);

                return [
                    'success' => true,
                    'message' => "User registered",
                    'data'    => $spiecie
                ];
            }
            catch(Exception $e)
            {
                return [
                    'success' => false,
                    'message' => 'require failed'
                ];
            }
        }

        public function show($id)
        {
            try
            {
                $spiecie    = $this->repository->find($id);
                $niche      = $this->repository_niche->find($spiecie->niche_id);

                return [
                    'success'   => true,
                    'spiecie'   => $spiecie,
                    'niche'     => $niche
                ];
            }
            catch(Exception $e)
            {
                return [
                    'success'   => false,
                    'message'   => "Not found"
                ];
            }
        }

        public function edit($id)
        {

        }

        public function update($id)
        {

        }

        public function delete($id)
        {

        }
    }
