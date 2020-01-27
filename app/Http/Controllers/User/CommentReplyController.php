<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\CommentReply;

class CommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Comment $comment)
    {
        return view('user.replies.index',compact('comment'));
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
    public function store(Request $request,Comment $comment)
    {
        $validateDates = $request->validate([
            'reply' => 'required',
            'comment_id' => 'required'
        ]);

        $validateDates['user_id'] = Auth::user()->id;

        $storeReply = CommentReply::create($validateDates);

        return redirect()->back()->with('status','Reply is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment,CommentReply $reply)
    {
        $deleteReply = $reply->delete();

        return redirect()->back()->with('status','Reply is deleted');
    }

    public function approve(CommentReply $reply){

        if( $reply->approve === 1 ){

            $reply->approve = 0;

        }else{

            $reply->approve = 1;
        }

        $reply->save();

        return redirect()->back()->with('status','Status of reply has been changed');
    }
}
