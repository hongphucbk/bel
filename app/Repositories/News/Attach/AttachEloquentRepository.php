<?php
namespace App\Repositories\Soft\Attach;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class AttachEloquentRepository extends EloquentRepository implements AttachRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Model\Soft\Attach::class;
    }

    
    


    
}
