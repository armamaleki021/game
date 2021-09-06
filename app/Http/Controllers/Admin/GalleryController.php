<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'گالری تصاویر';
        $gallery = Gallery::with('user')->paginate(15);
//        dd($gallery);
        return view('admin.gallery.index', compact('title', 'gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'ساخت گالری';
        return view('admin.gallery.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required|max:250',
            'description'=>'required',
            'alt'=>'required',

        ]);
        $data['slug']=str_replace(' ', '-' ,$data['title']);
        $data['user_id']=Auth::user()->id;
        $data=Gallery::create(@$data);
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
        $title='ادیت گالری';
        $gallery=Gallery::find($id);
        return view('admin.gallery.edit' ,compact('title', 'gallery'));
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
        $data=$request->validate([
            'title'=>'required|max:250',
            'description'=>'required',
            'alt'=>'required',

        ]);
        $data['slug']=str_replace(' ', '-' ,$data['title']);
        $data['user_id']=Auth::user()->id;
        $data=Gallery::find($id)->update(@$data);
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
