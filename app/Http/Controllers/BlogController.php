<?php

namespace App\Http\Controllers;


use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', [ 'except' => ['index' , 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name', 'id');
        return view('blog.create', compact('category'));
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

        $input = $request->all();
        $blog = Blog::create($input);

        if($categoryIds = $request->category_id){

            $blog->category()->sync($categoryIds);
        }

        return redirect('/blog');
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
        $blog = Blog::findOrFail($id);


        return view('blog.show', compact('blog'));
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
        $categories = Category::pluck('name', 'id');
        $blog = Blog::findOrFail($id);

        return view('blog.edit', compact('categories','blog'));

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
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);

        if($categoryIds = $request->category_id){

            $blog->category()->sync($categoryIds);
        }

        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $blog = Blog::findOrFail($id);
        $categoryIds = $request->category_id;
        $blog->category()->detach($categoryIds);
        $blog->delete($request->all());


        return redirect('/blog/bin');

    }

    public function bin(){

        $deletedBlogs = Blog::onlyTrashed()->get();
        return view('blog.bin', compact('deletedBlogs'));
    }

    public function restore($id){

        $restoredBlogs = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlogs->restore($restoredBlogs);

        return redirect('/blog');
    }

    public function destroyBlog($id){

        $destroyBlog = Blog::onlyTrashed()->findOrFail($id);
        $destroyBlog->forceDelete($destroyBlog);

        return back();
    }
}
