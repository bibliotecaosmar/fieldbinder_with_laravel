<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Entities\Niche;

class PaginationService
{
    private $repository;
    private $repository_niche;

    public function __construct(DB $repository, Niche $repository_niche)
    {
        $this->repository       = $repository::table('spiecies');
        $this->repository_niche = $repository_niche;
    }

    public function indexer($id)
    {
        try
        {
            $niche      = $this->repository_niche->where('id', $id)->first();
            $model      = $this->repository->where('niche_id', $id)
                                           ->orderBy('id', 'DESC')
                                           ->paginate(9);

            $catalog    = [
                'niche'     =>  $niche,
                'catalog'   =>  $model
            ];

            return [
                'success'   =>  true,
                'catalog'   =>  $catalog
            ];
        }
        catch(Exception $e)
        {
            return [
                'success'   => false,
                'niche'     => $niche->name ?? -1
            ];
        }
    }
}
