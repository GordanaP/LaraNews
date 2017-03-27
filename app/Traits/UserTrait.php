<?php

namespace App\Traits;

trait UserTrait
{
    /**
     * An authenticaed and authorized user creates a new article.
     *
     * @param  array $fields
     * @return void
     */
    function createArticle($fields)
    {
        return $this->articles()->create($fields);
    }

    /**
     * An authenticated user has one or multiple roles.
     *
     * @param  string or coll  $role
     * @return boolean
     */
    public function hasRole($role)
    {
        //$role is a string
        if (is_string($role))
        {
            return $this->roles->contains('name', $role);
        }

        //$role is a collection
        return !! $role->intersect($this->roles)->count();
    }

    /**
     * An authenticated user owns an article.
     *
     * @param  \App\Article $article
     * @return boolean
     */
    public function owns($article)
    {
        return $this->id  == $article->user_id;
    }

}