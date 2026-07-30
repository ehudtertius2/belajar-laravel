<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Blog';
        $blogs = Blog::get();
        return view('admin.blog.index', compact('blogs','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Blog";
        return view('admin.blog.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = null;
        if($request->hasFile('photo')){
            $photo = $request->file('photo')->store('blog', 'public');
        }

        Blog::create([
            'title'=> $request->title,
            'sub_content'=> str::slug($request->title),
            'content'=> $request->content,
            'photo'=> $photo,
            'is_active'=> $request->is_active,
            'author'=> auth()->user()->name,
        ]);

        return redirect()->to('admin/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Blog::findOrFail($id);
        $title = "Edit Blog";
        return view('admin.blog.update', compact('item', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'sub_content' => 'required',
            'content' => 'required',
            'is_active' => 'required|boolean',
        ]);


        $blog = Blog::findOrFail($id);
        $photo = $blog->photo;
        if($request->hasFile('photo')) {
            if($blog->photo) {
                //hapus file foto lama jika ada
                Storage::disk('public')->delete($blog->photo);
            }

            $photo = $request->file('photo')->store('blog','public');
        }

        $blog->update([
            'title' => $request->title,
            'sub_content'=> str::slug($request->title),
            'content' => $request->content,
            'photo' => $photo,
            'is_active' => $request->is_active,

        ]);

        return redirect()->to('admin/blog')->with('success', 'blog update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->photo) {
            // hapus file foto jika ada
            \Storage::disk('public')->delete($blog->photo);
        }
        $blog->delete();
        return redirect()->to('admin/blog')->with('success', 'blog destroyed successfully.');
    }
}
