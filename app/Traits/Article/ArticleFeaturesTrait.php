<?php

namespace App\Traits\Article;

use Carbon\Carbon;

trait ArticleFeaturesTrait
{
    /**
     * Get the articles filtered by their approval status.
     *
     * @param  string $query
     * @param  bool $flag
     * @return collection
     */
    public function scopeStatus($query, $flag)
    {
        return $query->where('status', $flag);
    }

    /**
     * Get the published articles.
     *
     * @param  $query
     * @return collection
     */
    public function scopePublished($query)
    {
        return $query->where('status', true)->where('published_at', '<=', Carbon::now());
    }

    /**
     * Get the unpublished articles.
     *
     * @param  $query
     * @return collection
     */
    public function scopeUnpublished($query)
    {
        return $query->where('status', true)->where('published_at', '>=', Carbon::now());
    }

    /**
     * Get the specified section articles.
     *
     * @param  $query
     * @return collection
     */
    public function scopeSection($query, $category_id)
    {
        return $query->where('category_id', $category_id);
    }

    public function isApproved()
    {
        return $this->status == true;
    }

    public function isDraft()
    {
        return $this->status == false;
    }

    public function isPublished()
    {
        return $this->isApproved() && $this->published_at <= Carbon::today();
    }

    public function isNotPublished()
    {
        return $this->isApproved() && $this->published_at > Carbon::today();
    }

    /**
     * Return the article status
     *
     * @return string
     */
    public function status()
    {
        if ($this->isDraft()) return "Under te consideration";

        elseif ($this->isNotPublished()) return "Approved";

        elseif ($this->isPublished()) return "Published";
    }

}