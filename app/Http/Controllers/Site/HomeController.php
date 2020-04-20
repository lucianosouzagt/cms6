<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Blog;
use App\Setting;
use App\Network;
use App\Client;
class HomeController extends Controller
{
    
    public function index(Request $request){
        $lang = $request->input('lang', 'pt-br');
        $i = 1;
        $n = 0;

        $clients = Client::where('status',1)->orderBy('ordination','asc')->limit(21)->get();

        $services = Service::where('lang',$lang)->where('status', 1)->orderBy('ordination','asc')->limit(24)->get();
        foreach ($services as $service) {
            
            $service['item'] = $i;
            $i = $i + 1;
        }

        $news = Blog::where('lang',$lang)->where('news', 1)->orderBy('id','desc')->get();
        foreach ($news as $new) {
            
            $new['item'] = $n;
            $n = $n + 1;
        }
        $dbsettings = Setting::where('lang', $lang)->get();
        $networks = Network::where('url','!=','')->get();
        $dbimages = Setting::where('type', 'img')->get();

        foreach($dbimages as $dbimage){
            $images[$dbimage['name']] = $dbimage['content'];
        }

        foreach($dbsettings as $dbsetting){
            $settings[$dbsetting['name']] = $dbsetting['content'];
        }

    
        return view('site.home',[
            'clients'=>$clients,
            'settings'=>$settings,
            'networks'=>$networks,
            'images'=>$images,
            'services'=>$services,
            'lang' =>$lang,
            'news' =>$news
        ]);
    }
    
}
