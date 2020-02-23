<?php
namespace App\Repositories\News\Content;

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
        return \App\Model\News\Content::class;
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
