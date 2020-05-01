<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('message.index', ['messages' => Message::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return Message::create($request->validate([
            'blog_id' => 'required|exists:App\Blog,id',
            'body' => 'required'
        ]))->load('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return Response
     */
    public function edit(Message $message)
    {
        if(auth()->user() != $message->user)
            abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return Response
     */
    public function update(Request $request, Message $message)
    {
        if(auth()->user() != $message->user)
            abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return Response
     */
    public function destroy(Message $message)
    {
        if(auth()->user() != $message->user)
            abort(403);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function list()
    {
        return Message::all()->load('blog');
    }

    public function list_blog_messages(Blog $blog)
    {
        return $blog->load('messages')->messages->load('user');
    }
}
