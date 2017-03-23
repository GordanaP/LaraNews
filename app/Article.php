<?php

namespace App;

use App\Traits\Article\ArticlePathsTrait;
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
        'title', 'body', 'category_id', 'status'
    ];


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

    public function scopePublished($query, $flag)
    {
        return $query->where('status', $flag);
    }

    public function isPublished($bool)
    {

        return $bool == true ? $this->status = true : $this->status = false;
    }



}
