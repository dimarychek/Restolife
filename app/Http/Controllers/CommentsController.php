<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comments;

class CommentsController extends Controller
{
    /**
     * CommentsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['show']]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $comments = Comments::all();

        return view('admin.comments.show', ['comments' => $comments]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, $id)
    {
        $this->validate($request, [
            'author' => 'required|max:100|min:5',
            'email' => 'required|email',
            'content' => 'required|min:5|max:400'
        ]);
        $all = $request->all();
        $all['article_id'] = $id;
        Comments::create($all);

        return back()->with('message', 'Thanks for the comment. After checking it is published.');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $comment = Comments::find($id);
        $comment->delete();

        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function published($id)
    {
        $comment = Comments::find($id);
        $comment->public = 1;
        $comment->save();

        return back();
    }
}
