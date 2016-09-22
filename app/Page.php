<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = "pages";
    protected $fillable = ['title', 'content', 'include_category', 'icon', 'sort_order', 'in_dev', 'meta_description', 'meta_keywords', 'public', 'front_page', 'show_in_menu'];
}
