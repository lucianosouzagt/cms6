<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use App\Network;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        
    }  
    public function index(Request $request){
        $settings = [];
        $lang = $request->input('lang', 'pt-br');
        $dbsettings = Setting::where('lang', $lang)->get();
        $dbnetworks = Network::all();
        $dbimages = Setting::where('type', 'img')->get();

        foreach($dbimages as $dbimage){
            $images[$dbimage['name']] = $dbimage['content'];
        }

        foreach($dbnetworks as $dbnetwork){
            $networks[$dbnetwork['name']] = $dbnetwork['url'];
        }

        foreach($dbsettings as $dbsetting){
            $settings[$dbsetting['name']] = $dbsetting['content'];
        }

        return view('admin.settings.index', [
            'settings'=>$settings,
            'networks'=>$networks,
            'images'=>$images,
            'lang'=>$lang
        ]);
    }
    public function save(Request $request){
        
        $lang = $request->input('lang', 'pt-br');

        $data = $request->only([
            'clientTitle',
            'about',
            'email',
            'telefone',
            'maps',
            'address',
            'district',
            'zipcode',
            'city',
            'state',
            `youtube`,
            'facebook',
            'instagram',
            'linkedin',
            'googleplus',
            'pinterest',
            'whatsapp'          
        ]);        
    
        if($request->input('youtube')){
            if($data['youtube'] == null){
                $data['youtube'] = '';
            }
        }
        if($request->input('facebbook')){
            if($data['facebook'] === null){
                $data['facebook'] = '';
            }
        }
        if($request->input('instagram')){
            if($data['instagram'] === null){
                $data['instagram'] = '';
            }
        }
        if($request->input('linkedin')){
            if($data['linkedin'] === null){
                $data['linkedin'] = '';
            }
        }
        if($request->input('googleplus')){
            if($data['googleplus'] === null){
                $data['googleplus'] = '';
            }
        }
        if($request->input('pinterest')){
            if($data['pinterest'] === null){
                $data['pinterest'] = '';
            }
        }
        if($request->input('whatsapp')){
            if($data['whatsapp'] === null){
                $data['whatsapp'] = '';
            }
        }
     
        
        $logo = $request->file('logo');
        $banner = $request->file('banner');
        $bannerMobile = $request->file('bannerMobile');
        $footer = $request->file('footer');
        $footerMobile = $request->file('footerMobile');
        
        
        if(!empty($logo)){
            $dblogo = Setting::find(19);
            if($request->logo->isValid()){
                $ext = $request->logo->extension();
                $imageName = 'logo'.date('His') . '.' . $ext;
                $dbImage = "media/images/site/$imageName";
                $request->logo->move(public_path('media/images/site'), $imageName);
               // dd($request->logo->storeAs('site', $imageName));
                
                $dblogo->content = $dbImage;
                $dblogo->save();
            }            
        }
        if(!empty($banner)){
            $dbBanner = Setting::find(20);
            if($request->banner->isValid()){
                $imageName = 'banner'.date('His') . '.' . $request->banner->extension();
                $dbImage = "media/images/$imageName";
                $request->banner->move(public_path('media/images'), $imageName);
                /* $request->image->storeAs('image', $imageName); */
                $dbBanner->content = $dbImage;
                $dbBanner->save();
            }            
        }
        if(!empty($bannerMobile)){
            $dbBannerMobile = Setting::find(21);
            if($request->bannerMobile->isValid()){
                $imageName = 'mobile'.date('His') . '.' . $request->bannerMobile->extension();
                $dbImage = "media/images/$imageName";
                $request->bannerMobile->move(public_path('media/images'), $imageName);
                /* $request->image->storeAs('image', $imageName); */
                $dbBannerMobile->content = $dbImage;
                $dbBannerMobile->save();
            }            
        }
        if(!empty($footer)){
            $dbFooter = Setting::find(22);
            if($request->footer->isValid()){
                $imageName = 'footer'.date('His') . '.' . $request->footer->extension();
                $dbImage = "media/images/$imageName";
                $request->footer->move(public_path('media/images'), $imageName);
                /* $request->image->storeAs('image', $imageName); */
                $dbFooter->content = $dbImage;
                $dbFooter->save();
            }            
        }
        if(!empty($footerMobile)){
            $dbFooterMobile = Setting::find(25);
            if($request->footerMobile->isValid()){
                $imageName = 'footerMobile'.date('His') . '.' . $request->footerMobile->extension();
                $dbImage = "media/images/$imageName";
                $request->footerMobile->move(public_path('media/images'), $imageName);
                /* $request->image->storeAs('image', $imageName); */
                $dbFooterMobile->content = $dbImage;
                $dbFooterMobile->save();
            }            
        }

        foreach($data as $item =>$value){
            Setting::where('name',$item)->where('lang',$lang)->update([
                'content'=>$value
            ]);
        } 

        return redirect()->route('settings');
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
