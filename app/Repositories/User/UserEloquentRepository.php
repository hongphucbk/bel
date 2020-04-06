<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
    public function getUserAsAuth()
    {
        $user = Auth::user();
        if($user->role < 4){
            return $this->_model::where('id','>', 1)->get();
        }
        return $this->_model::all();
    }

    
}
