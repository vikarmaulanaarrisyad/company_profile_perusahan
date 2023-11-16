<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Galery;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'publish')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $services = Service::orderBy('id', 'DESC')
            ->limit(4)
            ->get();

        $sliders = Banner::all();

        $gallery = Galery::random()->get();
        $about = About::first();

        return view('welcome', compact('posts', 'services', 'sliders', 'gallery', 'about'));
    }
}
