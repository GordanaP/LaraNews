<?php

namespace App\Traits\Article;

trait ArticlePathsTrait
{
    /**
     * Url path to the article.
     *
     * @param  string $name [route name]
     * @return url
     */
    public function path($name)
    {
        return route('articles.'.$name, str_slug($this->title));
    }

    /**
     * Url path to the article in a specific category.
     *
     * @param  string $name [route name]
     * @return url
     */
    public function category_path($name)
    {
        return route('articles.'.$name, [str_slug($this->category->name), str_slug($this->title)]);
    }

    /**
     * Url path to the related articles
     *
     * @param  string $related [filter name]
     * @return url
     */
    public function related_path($related)
    {
        return route('articles.by.'.$related, str_slug($this->$related->name));
    }

    /**
     * Url path to the file
     *
     * @return url
     */
    public function file_path()
    {
        return route('show.file', str_slug($this->title));
    }

}