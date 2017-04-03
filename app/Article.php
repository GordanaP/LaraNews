<?php

namespace App;

use App\Traits\Article\ArticleFeaturesTrait;
use App\Traits\Article\ArticlePathsTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use ArticlePathsTrait, ArticleFeaturesTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'category_id', 'status', 'published_at'
    ];

    /**
     * The attributes that are convertable to carbon instance.
     *
     * @var array
     */
    protected $dates = ['published_at'];

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

    /**
     * Make carbon instance of date
     *
     * @param string $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Apply filters to query string
     *
     * @param  complex $query
     * @param  array $filters
     * @return mixed
     */
    public function scopeFilter($query, $filters)
    {
        //Ask ThreadFilters class to apply itself to the query
        return $filters->apply($query);
    }
}
