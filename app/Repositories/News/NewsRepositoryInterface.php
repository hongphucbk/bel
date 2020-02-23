<?php
namespace App\Repositories\News;

interface NewsRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
}
