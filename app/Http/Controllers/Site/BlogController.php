<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index(Request $request){
        $lang = $request->input('lang', 'pt-br');

        $blogs = Blog::where('lang',$lang)->orderBy('id','desc')->get();
        foreach ($blogs as $blog) {
            
            $blog['date'] = date("d/m/Y H:i:s", strtotime($blog['datetime']));
        }

        return view('site.blog',[
            'blogs'=>$blogs,
            'lang' =>$lang
        ]);
    }

    public function site(){
        return view('site.site');
    }
    
}
