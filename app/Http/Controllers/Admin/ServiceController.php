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
       
        $services = Service::where('lang',$langs)->orderBy('id', 'desc')->paginate(10);

        return view('admin.service.index',[
            'services'=> $services,
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
            'image',
            'title',
            'body',
            'bgcolor',
            'textcolor'
        ]);
        if($request->image->isValid()){
            $imageName = date('YmdHms') . '.' . $request->image->extension();
            $dbImage = "media/images/$imageName";
            $request->image->move(public_path('media/images'), $imageName);
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
        $service->image = $dbImage;
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
                'title',
                'subtitle',
                'bgcolor',
                'textcolor',
                'body',
                'image'
            ]);

            $validator = Validator::make([
                'title'=>$data['title'],
                'subtitle'=>$data['subtitle'],
                'bgcolor'=>$data['bgcolor'],
                'textcolor'=>$data['textcolor']
            ],[
                'title'=>['required','string','max:100'],
                'subtitle'=>['string','max:100'],
                'bgcolor'=>['string', 'regex:/#[A-Z0-9]{6}/i'],
                'textcolor'=>['string', 'regex:/#[A-Z0-9]{6}/i'],
            ]);
            
            if(!empty($data['image'])){
                if($request->image->isValid()){
                    $imageName = date('YmdHms') . '.' . $request->image->extension();
                    $dbImage = "media/images/$imageName";
                    $request->image->move(public_path('media/images'), $imageName);
                    /* $request->image->storeAs('image', $imageName); */
                    $service->image = $dbImage;
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
