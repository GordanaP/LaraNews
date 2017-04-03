<?php

namespace App\Traits;

use App\Article;
use App\Category;
use App\Role;
use App\User;

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
    public function getArticles($filters)
    {
        return Article::latest('published_at')
            ->with('user', 'category')
            ->filter($filters);
    }

    /**
     * Fetch published articles
     *
     * @param  int $pp
     * @return collection
     */
    public function getPublished($filters)
    {
        return $this->getArticles($filters)
            ->published();
    }

    /**
     * Fetch unpublished articles
     *
     * @param  int $pp
     * @return collection
     */
    public function getUnpublished($filters)
    {
        return $this->getArticles($filters)
            ->unpublished();
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
            ->latest('published_at')
            ->with('user','category');
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
            ->latest('published_at')
            ->with('user','category')
            ->published();
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

    public function getUsers()
    {
        return User::with('roles');
    }

    function getRoles($sort = 'name', $order = 'asc')
    {
        return Role::orderBy($sort, $order);
    }

}