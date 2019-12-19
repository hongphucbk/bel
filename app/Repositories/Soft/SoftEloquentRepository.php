<?php
namespace App\Repositories\Soft;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class SoftEloquentRepository extends EloquentRepository implements SoftRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Model\Soft\Info::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAllSoft()
    {
        return $this->_model::all();
    }

    
}
