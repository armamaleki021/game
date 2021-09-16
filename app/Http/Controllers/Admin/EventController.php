<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

//use App\Models\Category;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'پست های شما';
        $event = Event::with('user')->paginate(15);
        $category = Category::with('category');

        return view('admin.event.index', compact('title', 'event','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'ساخت پست جدیید';
        $category = Category::all();
        return view('admin.event.create', compact('title','category'));
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
            'body' => 'nullable',
            'category' => 'nullable'
        ]);

        $data['slug'] = str_replace(' ', '-', $data['title']);
        $data['user_id'] = Auth::user()->id;
//        dd($data);
        $event = Event::create($data);

//@todo
        foreach ($request->category(id) as $cat) {
            $event->category()->attach($cat);
        }
        return redirect()->route('event.edit', $event->id);
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
        $event = Event::with('user')->find($id);

        return view('admin.event.edit', compact('title', 'event'));
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
//        @todo
        $data = $request->validate([
            'title' => 'required|max:250',
            'body' => 'nullable',
        ]);


        $data['slug'] = str_replace(' ', '-', $data['title']);
        $data['user_id'] = Auth::user()->id;

        $event = Event::find($id);
        $event->update($data);
//        $event->category()->sync($request->category);

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
        // @todo
        $event = Event::find($id)->delete();

        return back();

    }
}
