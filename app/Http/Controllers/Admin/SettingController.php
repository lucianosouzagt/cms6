<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use App\Network;
use App\Lang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        
    }  
    public function index(Request $request){
        $settings = [];
        $lang = $request->input('lang', 'pt-br');
        $langs = Lang::where('active', 1)->get();
        $dbsettings = Setting::where('lang', $lang)->get();
                

        $settings['lang'] = $lang;
        foreach($dbsettings as $dbsetting){
            $settings[$dbsetting['name']] = $dbsetting['content'];
        }

        return view('admin.settings.index', [
            'settings'=>$settings,
            'langs'=> $langs,
            'lang'=>$lang
        ]);
    }
    public function create(Request $request){

        $langs = Lang::where('active', 1)->get();

        return view('admin.settings.create', [
            'langs'=> $langs
        ]);
    }
    public function store(Request $request){
        $lang = $request->input('langs');
        $type = $request->input('type');
        $data = $request->only([
            'clientTitle',
            'more',
            'about',
            'aboutContent',
            'contact',
            'email',
            'telefone',
            'maps',
            'address',
            'district',
            'zipcode',
            'city',
            'state',
            'langs'
        ]);
        
        foreach ($data as $key => $value) {
            $setting = new Setting;
            $setting->name = $key;
            $setting->content = $value;
            $setting->type = $type;
            $setting->lang = $lang;
            $setting->save();
        }
        
        return redirect()->route('settings');
    }
    public function save(Request $request){
        
        $lang = $request->input('lang', 'pt-br');

        $data = $request->only([
            'clientTitle',
            'more',
            'about',
            'langs',
            'aboutContent',
            'email',
            'telefone',
            'maps',
            'address',
            'district',
            'zipcode',
            'city',
            'state',
        ]);
        
        $lang = $data['langs'];
        foreach($data as $item =>$value){
            Setting::where('name',$item)->where('lang',$lang)->update([
                'content'=>$value
            ]);
        } 

        return redirect()->route('settings');
    }
    public function images(Request $request){

        $dbimages = Setting::where('type', 'img')->get();

        foreach($dbimages as $dbimage){
            $images[$dbimage['name']] = $dbimage['content'];
        }

        return view('admin.settings.image', [
            'images'=>$images
        ]);
    }
    public function imagesSave(Request $request){
        
        $data = $request->only([
            'logo',
            'banner',
            'bannerMobile',
            'footer',
            'footerMobile'
        ]);

        $validator = Validator::make($data, [
            'logo' => ['image','mimes:jpeg,jpg,png','dimensions:max_width=300,min_width=150,max_height=120,min_height=30'],
            'banner' => ['image','mimes:jpeg,jpg,png','dimensions:max_width=1920,min_width=1024,max_height=1378,min_height=768'],
            'bannerMobile' => ['image','mimes:jpeg,jpg,png','dimensions:max_width=719,min_width=360,max_height=1000,min_height=500'],
            'footer' => ['image','mimes:jpeg,jpg,png','dimensions:max_width=720,min_width=360,max_height=900,min_height=450'],
            'footerMobile' => ['image','mimes:jpeg,jpg,png','dimensions:max_width=1920,min_width=1024,max_height=420,min_height=285']
        ]);
       
        if($validator->fails()){
            return redirect()->route('settings.images')
            ->withErrors($validator)
            ->withInput();
        }

        if(!empty($data['logo'])){
            $dblogo = Setting::find(19);
            
            if($request->logo->isValid()){
                $ext = $request->logo->extension();
                $imageName = 'logo'.date('His') . '.' . $ext;
                $newImage = $data['logo']->storeAs('site', $imageName);
                $dbImage = "storage/site/$imageName";
                $path = Storage::path($newImage);
                $newImg = Image::make($path)->resize(300, 150, function($c){
                    $c->aspectRatio();
                    $c->upsize();
                })->save();

                if($validator->fails()){
                    return redirect()->route('blog.create')
                    ->withErrors($validator)
                    ->withInput();
                }
                
                $dblogo->content = $dbImage;
                $dblogo->save();
            }
           
                        
        }
        if(!empty($data['banner'])){
            $dbBanner = Setting::find(20);
            if($request->banner->isValid()){
                $imageName = 'banner'.date('His') . '.' . $request->banner->extension();
                $newImage = $data['banner']->storeAs('site', $imageName);
                $dbImage = "storage/site/$imageName";
                $path = Storage::path($newImage);
                $newImg = Image::make($path)->resize(1920, 1378, function($c){
                    $c->aspectRatio();
                    $c->upsize();
                })->save();

                $dbBanner->content = $dbImage;
                $dbBanner->save();
            }            
        }
        if(!empty($data['bannerMobile'])){
            $dbBannerMobile = Setting::find(21);
            if($request->bannerMobile->isValid()){
                $imageName = 'mobile'.date('His') . '.' . $request->bannerMobile->extension();
                $newImage = $data['bannerMobile']->storeAs('site', $imageName);
                $dbImage = "media/images/$imageName";
                $request->bannerMobile->move(public_path('media/images'), $imageName);

                $dbBannerMobile->content = $dbImage;
                $dbBannerMobile->save();
            }            
        }
        if(!empty($data['footer'])){
            $dbFooter = Setting::find(22);
            if($request->footer->isValid()){
                $imageName = 'footer'.date('His') . '.' . $request->footer->extension();
                $newImage = $data['footer']->storeAs('site', $imageName);
                $dbImage = "media/images/$imageName";
                $request->footer->move(public_path('media/images'), $imageName);

                $dbFooter->content = $dbImage;
                $dbFooter->save();
            }            
        }
        if(!empty($data['footerMobile'])){
            $dbFooterMobile = Setting::find(25);
            if($request->footerMobile->isValid()){
                $imageName = 'footerMobile'.date('His') . '.' . $request->footerMobile->extension();
                $newImage = $data['footerMobile']->storeAs('site', $imageName);
                $dbImage = "media/images/$imageName";
                $request->footerMobile->move(public_path('media/images'), $imageName);

                $dbFooterMobile->content = $dbImage;
                $dbFooterMobile->save();
            }            
        }

        return redirect()->route('settings.images');
    }

    public function networks(Request $request){
        $dbnetworks = Network::all();
        
        foreach($dbnetworks as $dbnetwork){
            $networks[$dbnetwork['name']] = $dbnetwork['url'];
        }
        
        return view('admin.settings.network', [
            'networks'=>$networks
        ]);
    }

    public function networksSave(Request $request){
        $data = $request->only([
            'youtube',
            'facebook',
            'instagram',
            'linkedin',
            'googleplus',
            'pinterest',
            'whatsapp'  
        ]);

        foreach($data as $item =>$value){
            Network::where('name',$item)->update([
                'url'=>$value
            ]);
        } 

        return redirect()->route('settings.networks');
    }

    protected function validator($data){
        return Validator::make($data,[
            'title'=>['string', 'max:100'],
            'subtitle'=>['string', 'max:100'],
            'email'=>['string', 'email'],
            'bgcolor'=>['string', 'regex:/#[A-Z0-9]{6}/i'],
            'textcolor'=>['string', 'regex:/#[A-Z0-9]{6}/i'],
            'telefone'=>['string', 'max:15']
            

        ]);
    }
   
}
