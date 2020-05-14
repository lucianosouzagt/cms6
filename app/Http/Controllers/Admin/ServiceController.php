<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Lang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = $request->input('lang', 'pt-br');
        $langs = Lang::all();

        if(($request->input('id'))&&($request->input('ordination'))){
            $servi = $request->all();
            $serv = Service::find($servi['id']);
            $old = Service::where('ordination',$servi['ordination'])->where('lang',$lang)->update(['ordination'=>$serv['ordination']]);
            $serv->ordination = $servi['ordination'];
            $serv->save();

        }
                
        $i = 1;
        $servicesPreview = Service::where('lang',$lang)->where('status', 1)->orderBy('ordination','asc')->limit(24)->get();
        foreach ($servicesPreview as $servicePreview) {
            
            $servicePreview['item'] = $i;
            $i = $i + 1;
        }
        $servicesList = Service::where('lang',$lang)->where('status', 1)->orderBy('ordination','asc')->get();
        $services = Service::where('lang',$lang)->orderBy('id', 'desc')->paginate(10);

        return view('admin.service.index',[
            'services'=> $services,
            'servicesPreview'=>$servicesPreview,
            'servicesList'=>$servicesList,
            'langs'=> $langs,
            'lang'=> $lang
            
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $langs = Lang::where('active', 1 )->get();
        return view('admin.service.create',[
            'langs'=> $langs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'lang',
            'status',
            'ordination',
            'imageHeader',
            'imageBody',
            'title',
            'body',
            'bgcolor',
            'textcolor'
        ]);

        $validator = Validator::make($data, [
            'title'=>['required','string','max:100'],
            'body'=>['required','string'],
            'imageHeader'=> ['required','image','mimes:png','dimensions:max_width=440,min_width=220,max_height=440,min_height=220'],
            'imageBody'=> ['required','image','mimes:png','dimensions:max_width=440,min_width=220,max_height=440,min_height=220'],
            
        ]);

        if($request->file('image')){
            $imageName = 'header'.date('His') . '.' . $request->image->extension();
            $newImage = $data['imageHeader']->storeAs('clients', $imageName);
            $dbImage = "storage/services/$imageName";
            $path = Storage::path($newImage);
            $newImg = Image::make($path)->resize(440, 440, function($c){
                $c->aspectRatio();
                $c->upsize();
            })->save();
            $service->imageHeader = $dbImage;
        }
        if($request->file('imageBody')){
            $imageName = 'body'.date('His') . '.' . $request->imageBody->extension();
            $newImage = $data['imageBody']->storeAs('clients', $imageName);
            $dbImage1 = "storage/services/$imageName";
            $path = Storage::path($newImage);
            $newImg = Image::make($path)->resize(440, 440, function($c){
                $c->aspectRatio();
                $c->upsize();
            })->save();
            $service->imageBody = $dbImage1;
        }   

        

        if($validator->fails()){
            return redirect()->route('service.create')
            ->withErrors($validator)
            ->withInput();
        }

        $service = new Service;
        $service->title = $data['title'];
        $service->status = $data['status'];
        $service->ordination = $data['ordination'];       
        $service->content = $data['body'];
        $service->lang = $data['lang'];
        $service->bgcolor = $data['bgcolor'];
        $service->textcolor = $data['textcolor'];
        $service->save();

        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $langs = Lang::where('active', 1 )->get();
        $service = Service::find($id);
        if($service){
            return view('admin.service.edit',[
                'service'=> $service,
                'langs'=> $langs
            ]);
        }
        return view('service.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
         
        
        if($service){
            $data = $request->only([
                'lang',
                'status',
                'ordination',
                'title',
                'subtitle',
                'bgcolor',
                'textcolor',
                'body',
                'image',
                'imageBody'
            ]);

            $validator = Validator::make([
                'title'=>$data['title'],
                'subtitle'=>$data['subtitle'],
                'bgcolor'=>$data['bgcolor'],
                'textcolor'=>$data['textcolor']
            ],[
                'title'=>['required','string','max:100'],
                'subtitle'=>['max:100'],
                'bgcolor'=>['string', 'regex:/#[A-Z0-9]{6}/i'],
                'textcolor'=>['string', 'regex:/#[A-Z0-9]{6}/i'],
            ]);
            
            if(!empty($data['image'])){
                if($request->image->isValid()){
                    $imageName = 'header'.date('YmdHis') . '.' . $request->image->extension();
                    $newImage = $data['image']->storeAs('services', $imageName);
                    $dbImage = "storage/services/$imageName";
                    $path = Storage::path($newImage);
                    $newImg = Image::make($path)->resize(440, 440, function($c){
                        $c->aspectRatio();
                        $c->upsize();
                    })->save();

                    $service->imageHeader = $dbImage;
                }else{
                    $validator->errors()->add('image','Arquivo invalido');
                }
                
            }
            if(!empty($data['imageBody'])){
                if($request->imageBody->isValid()){
                    $imageNameBody = 'body'.date('YmdHis') . '.' . $request->imageBody->extension();
                    $newImage = $data['imageBody']->storeAs('services', $imageNameBody);
                    $dbImage1 = "storage/services/$imageNameBody";
                    $path = Storage::path($newImage);
                    $newImg = Image::make($path)->resize(440, 440, function($c){
                        $c->aspectRatio();
                        $c->upsize();
                    })->save();

                    $service->imageBody = $dbImage1;
                }else{
                    $validator->errors()->add('image','Arquivo invalido');
                }
                
            }

            $service->lang = $data['lang'];
            $service->status = $data['status'];
            $service->title = $data['title'];
            $service->subtitle = $data['subtitle'];
            $service->bgcolor = $data['bgcolor'];
            $service->textcolor = $data['textcolor'];
            $service->content = $data['body'];
            

            if(count($validator->errors())>0){
                return redirect()->route('service.edit',[
                    'service'=>$id
                ])->withErrors($validator);
            }

           $service->save(); 
        }
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('service.index');
    }

    public function done($id)
    {
        $service = Service::find($id);

        if($service){
            $service->status = 1 - $service->status;
            $service->save();
        }
        return redirect()->route('service.index');
    }
    
}
