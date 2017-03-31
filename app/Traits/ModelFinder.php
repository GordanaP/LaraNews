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
        return Article::latest('published_at')
            ->with('user', 'category')
            ->paginate($this->pp);
    }

    /**
     * Fetch published articles
     *
     * @param  int $pp
     * @return collection
     */
    public function getPublished()
    {
        return Article::latest('published_at')
            ->with('user', 'category')
            ->published()
            ->paginate($this->pp);
    }

    /**
     * Fetch unpublished articles
     *
     * @param  int $pp
     * @return collection
     */
    public function getUnpublished()
    {
        return Article::latest('published_at')
            ->with('user', 'category')
            ->unpublished()
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
     * Fetch published articles by a filter
     *
     * @param  int $filter
     * @return collection
     */
    public function getPublishedBy($filter)
    {
        return $filter->articles()
            ->with('user','category')
            ->published()
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