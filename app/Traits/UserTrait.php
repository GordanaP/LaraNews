<?php

namespace App\Traits;

use App\Role;

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
     * Assigne roles to the authenticaed user.
     *
     * @param  array  $role
     * @return mixed
     */
    public function assignRole($role)
    {
        if (count($this->roles))
        {
            return $this->roles()->sync($role);
        }

        return $this->roles()->attach($role);
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


    public function isSectionEditorFor($article)
    {
        return $this->hasRole('editor') && $this->profile->category_id == $article->category_id;
    }

}