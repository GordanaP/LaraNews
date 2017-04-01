<?php

namespace App\Filters;

use App\User;

class ArticleFilters extends Filters
{
    /**
     * @var array
     */
    protected $filters = ['author'];

    /**
     * Filter the query by the given username.
     *
     * @param  string $username
     */
    protected function author($username)
    {
        $user = User::where('name', rev_slug($username))->firstOrFail();

        $this->builder->where('user_id', $user->id);
    }


}

