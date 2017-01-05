<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;


use Illuminate\Support\Facades\Storage;
use File;
use jorenvanhocht\Blogify\Models\Slide;
use jorenvanhocht\Blogify\Requests\SlideRequest;


class SlideController extends BaseController
{
  public function index()
  {
    return view('blogify::admin.slide.new');
  }

  public function show()
    {
        $slides = Slide::orderBy('position', 'asc')->get();
        return view('blogify::admin.slide.index', compact('slides'));
    }

  public function store(SlideRequest $request)
  {

     $file = $request->file('file');
       $name = $file->getClientOriginalName();
       $url =  'slides/' . $name;

       Slide::create([
           'source' => $url
       ]);

        Storage::disk('public')->put($name, File::get($file));

        return redirect()->route('admin.slide.see') ;
  }

  public function destroy($id)
    {

      $slide = Slide::FindOrFail($id);

        $slide->delete();

        return redirect()->route('admin.slide.see');
    }

    public function up($id)
    {
        $entity = Slide::find($id);
        $entity->decrement('position');
        $entity->save();

        return redirect()->route('admin.slide.see');
    }

    public function down($id)
    {
        $entity= Slide::find($id);
        $entity->increment('position');
        $entity->save();

        return redirect()->route('admin.slide.see');
    }
}