<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Article;

class ArticlesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::all();

        return view('admin.articles.articles', ['articles' => $articles]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create');
        $categories = Category::all();

        return view('admin.articles.create', ['categories' => $categories]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if($request->hasFile('preview')) {
            $date = date('d.m.Y');
            $root = $_SERVER['DOCUMENT_ROOT']."/public/images/";
            if(!file_exists($root.$date)) {
                mkdir($root.$date);
            }
            $f_name = $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($root.$date, $f_name);
            $all = $request->all();
            $all['preview'] = "/public/images/".$date."/".$f_name;
            Article::create($all);
        } else {
            Article::create($request->all());
        }

        return back()->with('message', 'Post added');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        $root = $_SERVER['DOCUMENT_ROOT'];
        if(!empty($article->preview)) {
            unlink($root.$article->preview);
        }

        return back()->with('message', 'Post deleted');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();

        return view('admin.articles.edit', ['article' => $article, 'categories' => $categories]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if($request->hasFile('preview')) {
            $date = date('d.m.Y');
            $root = $_SERVER['DOCUMENT_ROOT']."/public/images/";
            if(!file_exists($root.$date)) {
                mkdir($root.$date);
            }
            $f_name = $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($root.$date, $f_name);
            $all = $request->all();
            $all['preview'] = "/public/images/".$date."/".$f_name;
            $article->update($all);
        } else {
            $article->update($request->all());
        }

        return back()->with('message', 'Post update');
    }
}
