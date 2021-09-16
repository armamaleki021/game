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
        return view('admin.gallery.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $title = 'ادیت گالری';
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit', compact('title', 'gallery'));
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
        dd($id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();

        if (file_exists(public_path() . '/gallery/' . $gallery->image)) {
            unlink(public_path() . '/gallery/' . $gallery->image);
        }
        return redirect()->back();
    }

    public function galleryImage(Request $request, $id)
    {
        $file = $request->file('file');
        $file->move(public_path() . '/gallery/', time() . '.' . $file->getClientOriginalExtension());


        $gallery = new Gallery();
        $gallery->event_id = $id;
        $gallery->image = time() . '.' . $file->getClientOriginalExtension();
        $gallery->user_id = Auth::user()->id;
        $gallery->save();
    }
}
