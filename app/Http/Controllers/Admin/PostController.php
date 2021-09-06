<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'پست های شما';
        $post = Post::with('user')->paginate(15);
        return view('admin.post.index', compact('title', 'post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'ساخت پست جدیید';
        return view('admin.post.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:250',
            'description' => 'nullable',
            'category_id' => 'nullable',
            'gallery_id' => 'nullable',
        ]);
        $data['slug'] = str_replace(' ', '-', $data['title']);
        $data['user_id'] = Auth::user()->id;
//        dd($data);
        $data = Post::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'اپدیت پست های شما';
        $post = Post::find($id);
        return view('admin.post.edit',compact('title', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:250',
            'description' => 'nullable',
            'category_id' => 'nullable',
            'gallery_id' => 'nullable',
        ]);
        $data['slug'] = str_replace(' ', '-', $data['title']);
        $data['user_id'] = Auth::user()->id;
//        dd($data);
        $data = Post::find($id)->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
