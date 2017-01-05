<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;

use jorenvanhocht\Blogify\Models\Slide;
use jorenvanhocht\Blogify\Requests\Request;

class SlideController extends BaseController
{
	public function index()
	{
		return view('blogify::admin.slide.new');
	}

	public function store(Request $request)
	{
	   $file = $request->file('file');
       $name = $file->getClientOriginalName();
	   $url =  \Storage::url($name);
       Slide::create([
           'source' => $url
       ]);
       \Storage::disk('local')->put($name,  \File::get($file));
       return ("archivo guardado");
	}
}