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
        
        $data = $request->all();

        dd($data);

        if(!empty($data['logo'])){
            if($request->logo->isValid()){
                $imageName = date('YmdHms') . '.' . $request->logo->extension();
                $dbImage = "media/images/$imageName";
                $request->logo->move(public_path('media/images'), $imageName);
                /* $request->image->storeAs('image', $imageName); */
                Setting::where('name','logo')->update([
                    'content'=>$dbImage
                ]);
            }            
        }
        if(!empty($data['banner'])){
            if($request->banner->isValid()){
                $imageName = date('YmdHms') . '.' . $request->banner->extension();
                $dbImage = "media/images/$imageName";
                $request->banner->move(public_path('media/images'), $imageName);
                /* $request->image->storeAs('image', $imageName); */
                Setting::where('name','banner')->update([
                    'content'=>$dbImage
                ]);
            }            
        }
        if(!empty($data['bannerMobile'])){
            if($request->bannerMobile->isValid()){
                $imageName = date('YmdHms') . '.' . $request->bannerMobile->extension();
                $dbImage = "media/images/$imageName";
                $request->bannerMobile->move(public_path('media/images'), $imageName);
                /* $request->image->storeAs('image', $imageName); */
                Setting::where('name','bannerMobile')->update([
                    'content'=>$dbImage
                ]);
            }            
        }
        if(!empty($data['footer'])){
            if($request->footer->isValid()){
                $imageName = date('YmdHms') . '.' . $request->footer->extension();
                $dbImage = "media/images/$imageName";
                $request->footer->move(public_path('media/images'), $imageName);
                /* $request->image->storeAs('image', $imageName); */
                Setting::where('name','footer')->update([
                    'content'=>$dbImage
                ]);
            }            
        }


        /* $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('settings')
            ->withErrors($validator);
        } */

        foreach($data as $item =>$value){
            Setting::where('name',$item)->update([
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
