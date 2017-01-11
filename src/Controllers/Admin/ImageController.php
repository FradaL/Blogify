<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;


use Illuminate\Support\Facades\Session;
use jorenvanhocht\Blogify\Models\Gallery;
use jorenvanhocht\Blogify\Requests\GalleryRequest;
use jorenvanhocht\Blogify\Requests\ImageRequest;


class ImageController extends BaseController
{
    public function create()
    {
        $gallerys = Gallery::pluck('name', 'id');

        return view ('blogify::admin.gallery.images.new', compact('gallerys'));
    }

    public function store(ImageRequest $request)
    {
        $gallery = Gallery::findOrFail($request->category_id);
        $files =$request->file('file');

        foreach ($files as $file)
        {
            $images[] = $gallery->addMedia($file)
                ->toMediaLibrary();
        }
        return redirect()->route('admin.images.redirect')->with('gallery', $images);
    }

    public function fields()
    {
        return view('blogify::admin.gallery.images.fields');
    }
}