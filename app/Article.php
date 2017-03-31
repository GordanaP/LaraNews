<?php

namespace App;

use App\Traits\Article\ArticlePathsTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use ArticlePathsTrait;

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
     * A collection of approved articles.
     *
     * @param  string $query
     * @param  bool $flag
     * @return mixed
     */
    public function scopeApproved($query, $flag)
    {
        return $query->where('status', $flag);
    }

    /**
     * Get published articles
     *
     * @param  $query
     * @return collection
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Get unpublished articles
     *
     * @param  $query
     * @return collection
     */
    public function scopeUnpublished($query)
    {
        return $query->where('published_at', '>=', Carbon::now());
    }

    /**
     * An approved article
     *
     * @param  bool  $bool
     * @return boolean
     */
    public function status()
    {
        if ($this->status == false)
        {
            return "Under te consideration";
        }
        elseif ($this->status == true && $this->published_at >= Carbon::today())
        {
            return "Approved";
        }
        elseif ($this->status == true && $this->published_at <= Carbon::today()) {
            return "Published";
        }

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
}
