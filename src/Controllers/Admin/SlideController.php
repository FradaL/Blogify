<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;


class SlideController extends BaseController
{

	public function index()
	{
		return view('blogify::admin.slide.new')
	}

	public function save(Request $request)
	{

       //obtenemos el campo file definido en el formulario
       $file = $request->file('file');

       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();

	   $url = Storage::url($nombre);

       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));

       return "archivo guardado";

	}
   


}