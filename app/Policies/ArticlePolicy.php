<?php

namespace App\Policies;

use App\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        return ! $article->isPublished() && ($user->owns($article) || $user->isSectionEditorFor($article));
    }

    public function view_dashboard(User $user)
    {
        return ! $user->hasRole('subscriber');
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('author');
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        return $article->isDraft() && ($user->owns($article) || $user->isSectionEditorFor($article));
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param  \App\User  $user
     * @param  \Apap\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        return $article->isDraft() && ($user->owns($article) || $user->isSectionEditorFor($article));
    }

    /**
     * Determine whether the user can change the article's status.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function update_status(User $user, Article $article)
    {
        return $user->isSectionEditorFor($article);
    }

    public function before($user, $ability)
    {
        if ($user->hasRole('admin'))
        {
            return true;
        }
    }

}
