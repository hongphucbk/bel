<?php
namespace App\Repositories\Soft;

interface SoftRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAllSoft();
}
