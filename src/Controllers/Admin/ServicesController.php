<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;
use jorenvanhocht\Blogify\Models\Like;
use jorenvanhocht\Blogify\Models\Metadata;
use jorenvanhocht\Blogify\Models\Post;
use jorenvanhocht\Blogify\Models\Services;
use jorenvanhocht\Blogify\Models\Slide;

use jorenvanhocht\Blogify\Requests\Request;
use jorenvanhocht\Blogify\Requests\ServiceRequest;
use jorenvanhocht\Blogify\Requests\SlideRequest;
use jorenvanhocht\Blogify\Requests\UpdateServiceRequest;


class ServicesController extends BaseController
{

    public function index()
    {
        $services = Services::get();

        return view('blogify::admin.services.index', compact('services'));
    }

      public function create()
      {
        return view('blogify::admin.services.new');
      }

      public function store(ServiceRequest $request)
      {
          dd($request->file('image'));
          $request['slug'] = str_slug($request->name);
          $newService = Services::create($request->all());
          $newService->addMedia($request->file('image'))->toMediaLibrary();

          session()->flash('key', 'Status');

          return redirect()->route('admin.services.index');
      }

      public function edit($id)
      {
          $service = Services::find($id);
          return view ('blogify::admin.services.new', compact('service'));
      }

      public function update($id, UpdateServiceRequest $request)
      {
          $service = Services::find($id);
          if ($request->hasFile('image'))
          {
                $service->addMedia($request->file('image'))->toMediaLibrary();
          }
          else
          {
              $service->name = $request->name;
              $service->description = $request->description;
              $service->save();
          }

          return redirect()->route('admin.services.index');
      }

      public function destroy($id)
      {
          $service = Services::find($id);
          $service->delete();

          return redirect()->back();

      }




}