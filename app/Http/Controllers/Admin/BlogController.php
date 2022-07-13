<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Blog::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary"
               
                            href="' . route('blog.edit', $item->id) . '">
                            Edit
                        </a>
                        <form action="' . route('blog.destroy', $item->id) . '" method="POST">
                        <button class="btn btn-danger" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->editColumn('price', function ($item) {
                    return number_format($item->price);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create', [
            'label' => 'Create',
            'blog' => new Blog()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $cover      = $request->file('cover');
        $fileName   = time() . '_' . $cover->getClientOriginalName();
        $cover      = $cover->storeAs('images/blogs', $fileName, 'public');

        Blog::create([
            'cover'     => $cover,
            'title'     => str($request->title)->title(),
            'slug'      => str($request->title)->slug(),
            'content'   => $request->content,
        ]);

        return to_route('blog.index')->with('success', 'Blog created successfully');
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
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', [
            'label' => 'Update',
            'blog'  => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $cover = $request->file('cover');
        if ($cover) {
            \Illuminate\Support\Facades\Storage::delete('public/' . $blog->cover);
            $fileName = time() . '_' . $cover->getClientOriginalName();
            $cover = $cover->storeAs('images/blogs', $fileName, 'public');
        } else {
            $cover = $blog->cover;
        }

        $blog->update([
            'cover'     => $cover,
            'title'     => str($request->title)->title(),
            'slug'      => str($request->title)->slug(),
            'content'   => $request->content,
        ]);

        return to_route('blog.index')->with('success', 'Blog Post updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {

        $blog->delete();

        return to_route('blog.index')->with('success', 'Blog Post deleted successfully');
    }
}
