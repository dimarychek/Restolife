<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = ['title', 'content', 'preview', 'meta_description', 'meta_keywords', 'category_id', 'comments_enable', 'public'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comments', 'article_id', 'id');
    }

}
