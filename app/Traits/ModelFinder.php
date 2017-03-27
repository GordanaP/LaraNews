<?php

namespace App\Traits;

use App\Article;
use App\Category;

trait ModelFinder
{
    protected $pp = 6;

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
    public function getArticles()
    {
        return Article::latest()
            ->with('user', 'category')
            ->published(true)
            ->paginate($this->pp);
    }

    /**
     * Fetch all articles by a filter
     *
     * @param  int $filter
     * @return collection
     */
    public function getArticlesBy($filter)
    {
        return $filter->articles()
            ->with('user','category')
            ->paginate($this->pp);
    }

    /**
     * Fetch single article
     *
     * @param  int $id
     * @return collection
     */
    public function getArticle($id)
    {
        return Article::with('user', 'category')->findOrFail($id);
    }

}