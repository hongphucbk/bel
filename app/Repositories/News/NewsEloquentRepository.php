<?php
namespace App\Repositories\News;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class NewsEloquentRepository extends EloquentRepository implements NewsRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Model\News\Info::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll()
    {
        return $this->_model::all();
    }

    
}
