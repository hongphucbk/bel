<?php
namespace App\Repositories\News\Content;

interface ContentRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
}
