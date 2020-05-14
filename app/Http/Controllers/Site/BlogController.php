<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Setting;
use App\Network;
use App\Lang;

class BlogController extends Controller
{
    public function index(Request $request){
        $lang = $request->input('lang', 'pt-br');
        $langs = Lang::where('active', 1)->get();

        $blogs = Blog::where('lang',$lang)->orderBy('id','desc')->get();
        foreach ($blogs as $blog) {
            
            $blog['date'] = date("d/m/Y H:i:s", strtotime($blog['datetime']));
        }
        $networks = Network::where('url','!=','')->get();
        $dbimages = Setting::where('type', 'img')->get();

        foreach($dbimages as $dbimage){
            $images[$dbimage['name']] = $dbimage['content'];
        }

        return view('site.blog',[
            'blogs'=>$blogs,
            'networks'=>$networks,
            'images'=>$images,
            'langs'=>$langs,
            'lang' =>$lang
        ]);
    }

    public function site(){
        return view('site.site');
    }
    
}
