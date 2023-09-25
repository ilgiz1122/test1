<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function moderator_kurs_comment_view($kurs_id)
    {
        $comments = Comment::where('product_id', $kurs_id)->paginate(50);

        return view('moderator.kurs_comment_view', [
        'comments' => $comments,
       ]);
    }



    public function moderator_kurs_comment_update_status($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();

        if ($comment->status == 0) {
            DB::table('comments')->where('id', $comment_id)->update([
                'status' => 1,           
            ]);
        }else {
            DB::table('comments')->where('id', $comment_id)->update([
                'status' => 0,           
            ]);
        }

        return response()->json(true);
    }

    public function moderator_kurs_comment_edit_text($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();

        return view('moderator.kurs_comment_edit', [
            'comment' => $comment,
       ]);
    }

    public function moderator_kurs_comment_update_text(Request $request, $comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();
        DB::table('comments')->where('id', $comment_id)->update([
                'text' => $request->text,           
            ]);

        return redirect()->route('moderator_kurs_comment_view', $comment->product_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
