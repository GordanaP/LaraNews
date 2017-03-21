<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'category_id', 'status'
    ];

    /**
     * Url path
     * @param  string $related [relation name]
     * @return string
     */
    public function path($related = null)
    {
        if ($related != null)
        {
            return route('articles.by.'.$related, str_slug($this->$related->name));
        }
        else
        {
            return route('articles.show', str_slug($this->title));
        }
    }

    /**
     * An article belongs to a category.
     *
     * return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A article belongs to a user.
     *
     * return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
