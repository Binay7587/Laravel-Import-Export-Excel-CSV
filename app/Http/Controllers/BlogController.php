<?php

namespace App\Http\Controllers;

use App\Imports\BlogsImport;
use App\Exports\BlogsExport;
use App\Models\Blog;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BlogController extends Controller
{
    protected $blog = null;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Blog::all();
        return view('importexport', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->blog->validateBlog());
        $blog = new Blog($validatedData);
        $success = $blog->save();
        return redirect(route('importexport.create'));
    }

    public function import(Request $request)
    {
         $request->validate([
            'csv' => 'required'
        ]);
        $path = $request->file('csv');
        Excel::import(new BlogsImport(), $path);
        return redirect(route('importexport.create'));
    }

    public function export()
    {
        return Excel::download(new BlogsExport(), 'blog.xls');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

}
