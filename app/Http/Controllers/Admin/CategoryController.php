<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'دسته بندی های شما';
        $category = Category::paginate(15);
        return view('admin.category.index', compact('title', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'ساخت دسته بندی';
        return view('admin.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->toArray());

        $data = $request->validate([
            'title' => 'required|max:250',
            'body' => 'nullable',
        ]);
        $data['slug'] = str_replace(' ', '-', $data['title']);

        $data = Category::create($data);

        return redirect()->route('category.edit', $data->id);
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
        $title = 'ادیت دسته بندی';
        $category = Category::find($id);
        return view('admin.category.edit', compact('title', 'category'));
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
//        dd($request->toArray());
        $data = $request->validate([
            'title' => 'required|max:250',
            'body' => 'nullable',
        ]);
        $data['slug'] = str_replace(' ', '-', $data['title']);
        Category::find($id)->update($data);
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
//        dd($id);
        $category = Category::find($id);
//
        $category->delete();
        return back();

    }
}
