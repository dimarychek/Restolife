<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Category;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'pages' => Page::all()
        ];

        return view('admin.pages.pages', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.pages.create', ['categories' => $categories]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if($request->hasFile('icon')) {
            $date = date('d.m.Y');
            $root = $_SERVER['DOCUMENT_ROOT']."/public/images/";
            if(!file_exists($root.$date)) {
                mkdir($root.$date);
            }
            $f_name = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move($root.$date, $f_name);
            $all = $request->all();
            $all['icon'] = "/public/images/".$date."/".$f_name;
            Page::create($all);
        } else {
            Page::create($request->all());
        }

        return back()->with('message', 'Page added.');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return back()->with('message', "Page " . $page->title . " deleted.");
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $page = Page::find($id);
        $categories = Category::all();

        return view('admin.pages.edit', ['page' => $page, 'categories' => $categories]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        if($request->hasFile('icon')) {
            $date = date('d.m.Y');
            $root = $_SERVER['DOCUMENT_ROOT']."/public/images/";
            if(!file_exists($root.$date)) {
                mkdir($root.$date);
            }
            $f_name = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move($root.$date, $f_name);
            $all = $request->all();
            $all['icon'] = "/public/images/".$date."/".$f_name;
            $page->update($all);
        } else {
            $page->update($request->all());
        }

        return back()->with('message', 'Page updated.');
    }
}
