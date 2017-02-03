<?php

namespace jorenvanhocht\Blogify\Controllers\Admin;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;
use jorenvanhocht\Blogify\Models\Like;
use jorenvanhocht\Blogify\Models\MediaImage;
use jorenvanhocht\Blogify\Models\Metadata;
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

  public function overview()
  {

      $likes = Like::groupBy('likeable_id')
                    ->get([DB::raw('*, count(*) as total'), 'likeable_id']);

      return view('blogify::admin.likes.overview', compact('likes'));

  }

    public function imageLike($request, $id)
    {
        $img = Metadata::find($id);

        $img->likes()->create(['address_ip' => \Request::ip()]);

        return  redirect()->back();
    }

}