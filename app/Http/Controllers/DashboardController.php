<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Service;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::count();
        $post = Post::count();
        $service = Service::count();
        $subscribers = Subscriber::count();

        return view('admin.dashboard.index', compact([
            'categories',
            'post',
            'service',
            'subscribers',
        ]));
    }
}
