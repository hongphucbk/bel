<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getUserAsAuth();
}
