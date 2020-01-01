<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Model\User\User::class;
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
