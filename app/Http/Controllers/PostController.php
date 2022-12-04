<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $title= '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title =' in ' . $category->name;
        }
        if(request('user')){
            $user = User::firstWhere('username', request('user'));
            $title =' by ' . $user->name;
        }

        return view('posts',[
            "title"=>"All Posts" . $title,
            "active"=>"posts",
            "posts"=>Post::latest()->filter(request(['search','category','user']))->paginate(4)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            "title"=>"single post",
            "active"=>"posts",
            "post"=>$post
        ]);
    }
}
