<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Message;
use Exception;
use Illuminate\Http\RedirectResponse;
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
        return response()
            ->view('message.index', ['messages' => Message::whereUserId(auth()->id())->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create()
    {
        return response()->redirectToRoute('blog.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return response(
            Message::create($request->validate([
                    'blog_id' => 'required|exists:App\Blog,id',
                    'body' => 'required'
                ]))->load('user'), 200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return RedirectResponse|Response
     */
    public function show(Message $message)
    {
        return response()->redirectToRoute('blog.show', $message->blog->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Message $message
     * @return Response
     */
    public function edit(Message $message)
    {
        if (auth()->id() != $message->user_id)
            abort(403);

        return response()
            ->view('message.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Message $message
     * @return Response
     */
    public function update(Request $request, Message $message)
    {
        if (auth()->id() != $message->user_id)
            abort(403);

        if ($message->update($request->validate([
            'body' => 'required'
        ])))
            return response(['message' => "Message successfully updated!"], 200)
                ->header('Content-Type', 'application/json');
        else
            abort(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return Response
     * @throws Exception
     */
    public function destroy(Message $message)
    {
        if (auth()->id() != $message->user_id)
            abort(403);

        if($message->delete())
            return response(['message' => "Message deleted!"], 200)
                ->header('Content-Type', 'application/json');
        else
            abort(500);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function list()
    {
        return response(Message::whereUserId(auth()->id())->get()->load('blog'), 200)
            ->header('Content-Type', 'application/json');
    }


    /**
     * Display a listing of the resource.
     *
     * @param Blog $blog
     * @return Response
     */
    public function blog(Blog $blog)
    {
        return response($blog->load('messages')->messages->load('user'), 200)
            ->header('Content-Type', 'application/json');
    }
}
