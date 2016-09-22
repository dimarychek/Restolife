<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Comments;
use App\Page;
use App\Category;

class FrontController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Category::join('articles', 'categories.id', '=', 'articles.category_id')
                    ->where(['public' => 1, 'show_on_front' => 1, 'category_id' => 5])
                    ->get();
        $restaurants = Category::join('articles', 'categories.id', '=', 'articles.category_id')
                    ->where(['public' => 1, 'show_on_front' => 1, 'category_id' => 6])
                    ->get();
        $frontPage = Page::where('front_page', 1)->get();

        return view('site.frontpage', ['restaurants' => $restaurants, 'articles' => $articles, 'frontPage' => $frontPage]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $comments = Article::where('public', '=', 1)
                    ->find($id)
                    ->comments()
                    ->where('public', '=', 1)
                    ->get();
        $article = Article::where('public', '=', 1)->find($id);

        return view('site.show', ['article' => $article, 'comments' => $comments]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page($id)
    {
        $pages = Page::where('public', 1)->find($id);

        $posts = Page::where('pages.id', $id)
                ->join('articles', 'pages.include_category', '=', 'articles.category_id')
                ->where(['articles.public' => 1])
                ->get();

        return view('site.page', ['pages' => $pages, 'posts' => $posts]);
    }
}
