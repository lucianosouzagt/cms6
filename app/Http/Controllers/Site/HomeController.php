<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Blog;
class HomeController extends Controller
{
    
    public function index(Request $request){
        $lang = $request->input('lang', 'pt-br');
        $i = 1;
        $n = 0;

        $services = Service::where('lang',$lang)->where('status', 1)->orderBy('id','desc')->limit(24)->get();
        foreach ($services as $service) {
            
            $service['item'] = $i;
            $i = $i + 1;
        }

        $news = Blog::where('lang',$lang)->where('news', 1)->orderBy('id','desc')->get();
        foreach ($news as $new) {
            
            $new['item'] = $n;
            $n = $n + 1;
        }
        
        return view('site.home',[
            'services'=>$services,
            'lang' =>$lang,
            'news' =>$news
        ]);
    }
    
}
