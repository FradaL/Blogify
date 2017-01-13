<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use jorenvanhocht\Blogify\Models\Gallery;
use jorenvanhocht\Blogify\Models\Media;
use jorenvanhocht\Blogify\Models\MediaImage;
use jorenvanhocht\Blogify\Models\Metadata;
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

        foreach ($files as $key => $file)
        {
            $images[$key] = $gallery->addMedia($file)->toMediaLibrary();
            Metadata::create([
                'title' => '',
                'description' => '',
                'location' => '',
                'media_id' => $images[$key]->id,
            ]);
        }
        return redirect()->route('admin.images.redirect')->with('gallery', $images);
    }

    public function fields()
    {
        return view('blogify::admin.gallery.images.fields');
    }

    public function AddDataGallery(Request $request)
    {

        foreach ($request->image as $image) {
            $media[] = MediaImage::FindOrFail($image);
        }
            for($count = 0;$count < count($request->title);$count++)
            {
                $meta = Metadata::where('media_id',$media[$count]->id)->first();

                $meta->title =$request['title'][$count];
                $meta->description = $request['description'][$count];
                $meta->location = $request['ubication'][$count];
                $meta->save();
            }

        return redirect()->route('admin.gallery.overview')->with('message', 'blogify::gallery.images.message.value');
    }

    public function ViewUpdate($id)
    {
        $gallery = Gallery::findOrFail($id);
        $media = $gallery->mediaImage;

        return view('blogify::admin.gallery.images.view', compact('media'));
    }

    public function EditImage($image)
    {
        $meta = Metadata::where('media_id', $image)->first();
        $src = $meta->mediaimage->gallery->getMedia();
        $img = $src->where('id', $meta->media_id)->first();

        return view('blogify::admin.gallery.images.edit', compact('meta', 'img'));
    }

}