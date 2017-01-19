<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;



use Illuminate\Support\Facades\Storage;
use File;
use jorenvanhocht\Blogify\Models\Post;
use jorenvanhocht\Blogify\Models\Slide;

use jorenvanhocht\Blogify\Requests\SlideRequest;


class LikeController extends BaseController
{

  public function index()
  {
    return view('blogify::admin.slide.new');
  }

  public function postLike($id)
  {
      $post = Post::find($id);

      $post->likes()->create(['address_ip' => \Request::ip()]);

      return  redirect()->back();
  }



}