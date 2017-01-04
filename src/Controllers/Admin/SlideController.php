<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;


class SlideController extends BaseController
{

	public function index()
	{
		return view('blogify::admin.slide.new');
	}

	public function save(Request $request)
	{
	   $file = $request->file('file');
       $name = $file->getClientOriginalName();
	   $url =  \Storage::url($name);
       \Storage::disk('local')->put($name,  \File::get($file));

       return ("archivo guardado");

	}
   


}