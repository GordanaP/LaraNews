<?php

namespace App\Traits;

use App\Category;

trait ModelFinder
{
    /**
     * Fetch all categories
     *
     * @param  string $sort  [column]
     * @param  string $order [order]
     * @return \Illuminate\Http\Response
     */
    public function getCategories($sort='name', $order='asc')
    {
        return Category::orderBy($sort, $order)->get();
    }
}