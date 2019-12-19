<?php
namespace App\Repositories\Soft\Content;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class ContentEloquentRepository extends EloquentRepository implements ContentRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Model\Soft\Content::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAllSoft1()
    {
        return $this->_model::all();
    }

    
}
