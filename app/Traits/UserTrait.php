<?php

namespace App\Traits;

trait UserTrait
{
    /**
     * Create new article
     *
     * @param  array $fields
     * @return void
     */
    function createArticle($fields)
    {
        return $this->articles()->create($fields);
    }
}