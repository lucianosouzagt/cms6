<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $langs = $request->input('lang', 'pt-br');

        if(($request->input('id'))&&($request->input('ordination'))){
            $servi = $request->all();
            $serv = Service::find($servi['id']);
            $old = Service::where('ordination',$servi['ordination'])->get();
            $serv->ordination = $servi['ordination'];
            $serv->save();

        }
                
        $i = 1;
        $servicesPreview = Service::where('lang',$langs)->where('status', 1)->orderBy('ordination','asc')->limit(24)->get();
        foreach ($servicesPreview as $servicePreview) {
            
            $servicePreview['item'] = $i;
            $i = $i + 1;
        }
        $servicesList = Service::where('lang',$langs)->where('status', 1)->orderBy('ordination','asc')->get();
        $services = Service::where('lang',$langs)->orderBy('id', 'desc')->paginate(10);

        return view('admin.service.index',[
            'services'=> $services,
            'servicesPreview'=>$servicesPreview,
            'servicesList'=>$servicesList,
            'lang'=> $langs
            
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = 'pt-br';

        return view('admin.service.create',[
            'lang'=> $langs
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
            'imageHeader',
            'imageBody',
            'title',
            'body',
            'bgcolor',
            'textcolor'
        ]);
        if($request->image->isValid()){
            $imageName = 'header'.date('His') . '.' . $request->image->extension();
            $dbImage = "media/images/$imageName";
            $request->image->move(public_path('media/images'), $imageName);
            /* $request->image->storeAs('image', $imageName); */
        }
        if($request->imageBody->isValid()){
            $imageName = 'body'.date('His') . '.' . $request->imageBody->extension();
            $dbImage1 = "media/images/$imageName";
            $request->imageBody->move(public_path('media/images'), $imageName);
            /* $request->image->storeAs('image', $imageName); */
        }

        $validator = Validator::make($data, [
            'title'=>['required','string','max:100'],
            'body'=>['required','string']
            
        ]);

        if($validator->fails()){
            return redirect()->route('service.create')
            ->withErrors($validator)
            ->withInput();
        }

        $service = new Service;
        $service->title = $data['title'];
        $service->status = $data['status'];
        $service->imageHeader = $dbImage;
        $service->imageBody = $dbImage1;
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
        $service = Service::find($id);
        if($service){
            return view('admin.service.edit',[
                'service'=> $service
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
                'imageHeader',
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
                    $dbImage = "media/images/$imageName";
                    $request->image->move(public_path('media/images'), $imageName);
                    /* $request->image->storeAs('image', $imageName); */
                    $service->imageHeader = $dbImage;
                }else{
                    $validator->errors()->add('image','Arquivo invalido');
                }
                
            }
            if(!empty($data['imageBody'])){
                if($request->imageBody->isValid()){
                    $imageNameBody = 'body'.date('YmdHis') . '.' . $request->imageBody->extension();
                    $dbImageBody = "media/images/$imageNameBody";
                    $request->imageBody->move(public_path('media/images'), $imageNameBody);
                    /* $request->image->storeAs('image', $imageName); */
                    $service->imageBody = $dbImageBody;
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
