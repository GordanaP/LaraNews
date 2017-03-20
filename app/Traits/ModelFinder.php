<?php

namespace App\Traits;

use App\Article;
use App\Category;

trait ModelFinder
{
    /**
     * Fetch all categories
     *
     * @param  string $sort  [column]
     * @param  string $order [order]
     * @return collection
     */
    public function getCategories($sort='id', $order='asc')
    {
        return Category::orderBy($sort, $order)->get();
    }


    /**
     * Fetch all articles
     *
     * @param  int $pp
     * @return collection
     */
    public function getArticles($pp = 6)
    {
        return Article::latest()
                ->with('user', 'category')
                ->paginate($pp);
    }

    /**
     * Filter articles
     *
     * @param  string $sort  [column]
     * @param  string $order [order]
     * @param  int $id
     * @return collection
     */
    public function filterArticles($column, $id, $pp = 6)
    {
        return Article::latest()
                ->with('user', 'category')
                ->where($column, $id)
                ->paginate($pp);
    }

}