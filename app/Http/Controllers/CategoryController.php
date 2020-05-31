<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
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
            ->view('category.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()
            ->view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->validate([
            'name' => 'required|unique:App\Category,name',
            'description' => 'required'
        ]));

        $category->{"message"} = "Category successfully added!";

        return response($category, 200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        $category->load('blogs');

        return response()
            ->view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        return response()
            ->view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        if($category->update($request->validate([
            'description' => 'required'
        ])))
            return response(['message' => "Category successfully updated!"], 200)
                ->header('Content-Type', 'application/json');
        else
            abort(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        if($category->blogs->count())
            abort(403);

        if($category->delete())
            return response(['message' => "Category deleted!"], 200)
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
        return response(Category::all()->load('blogs'), 200)
            ->header('Content-Type', 'application/json');
    }
}
