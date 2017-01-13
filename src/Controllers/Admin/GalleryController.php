<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;


use Illuminate\Support\Facades\Session;
use jorenvanhocht\Blogify\Models\Gallery;
use jorenvanhocht\Blogify\Requests\GalleryRequest;


class GalleryController extends BaseController
{
    public function create()
    {
        return view ('blogify::admin.gallery.new');
    }

    public function store(GalleryRequest $request)
    {
        $request['slug'] = str_slug($request->name);
        Gallery::create($request->all());

        Session::flash('success', 'Gallery Created Successful');

        return redirect()->route('admin.gallery.overview');
    }

    public function show()
    {
        $gallerys = Gallery::orderBy('created_at', 'desc')->get();

        return view ('blogify::admin.gallery.index', compact('gallerys'));
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view ('blogify::admin.gallery.new', compact('gallery'));
    }

    public function update($id, GalleryRequest $request)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->name = $request->name;
        $gallery->save();

        Session::flash('success', 'Gallery Created Successful');

        return redirect()->route('admin.gallery.overview');

    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        Session::flash('success', 'Gallery Deleted Successful');

        return redirect()->route('admin.gallery.overview');
    }
}