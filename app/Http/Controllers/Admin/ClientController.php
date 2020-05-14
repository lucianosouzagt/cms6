<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(10);
        return view('admin.client.index',[
            'clients'=>$clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
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
            'status',
            'name',
            'image',
            'ordination'
        ]);
        $validator = Validator::make($data, [
            'name' => ['required','string', 'max:100'],
            'image' => ['required','image','mimes:png','dimensions:max_width=300,min_width=75,max_height=150,min_height=30']
        ]);
        if($validator->fails()){
            return redirect()->route('client.create')
            ->withErrors($validator)
            ->withInput();
        }

        $imageName = date('YmdHis') . '.' . $request->image->extension();
        $newImage = $data['image']->storeAs('clients', $imageName);
        $dbImage = "storage/clients/$imageName";
        $path = Storage::path($newImage);
        $newImg = Image::make($path)->resize(150, 64, function($c){
            $c->aspectRatio();
            $c->upsize();
        })->save();


        /* if($request->image->isValid()){
            $imageName = date('YmdHis') . '.' . $request->image->extension();
            $dbImage = "media/images/$imageName";
            $request->image->move(public_path('media/images'), $imageName);
        } */

        $client = new Client;
        $client->status = $data['status'];
        $client->ordination = $data['ordination'];
        $client->name = $data['name'];
        $client->image = $dbImage;
        $client->save();

        return redirect()->route('client.index');
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
        $client = Client::find($id);
        if($client){
            return view('admin.client.edit',[
                'client'=> $client
            ]);
        }
        return view('client.index');
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
        $client = client::find($id);
         
        
        if($client){
            $data = $request->only([
                'name',
                'status',
                'image',
                'ordination'
            ]);

            $validator = Validator::make($data, [
                'name' => ['required','string', 'max:100'],
                'image' => ['required','image','mimes:png','dimensions:max_width=300,min_width=75,max_height=150,min_height=30']
            ]);
            if($validator->fails()){
                return redirect()->route('client.edit',[
                    'client'=>$id
                ])->withErrors($validator)
                  ->withInput();
            }
            
            
            if(!empty($data['image'])){
                if(!empty($client->imageName)){
                    $imageName = $client->imageName;
                }else{
                    $imageName = date('YmdHis') . '.' . $request->image->extension();
                    
                }
               // $imageName = date('YmdHis') . '.' . $request->image->extension();
                $newImage = $data['image']->storeAs('clients', $imageName);
                $dbImage = "storage/clients/$imageName";
                $path = Storage::path($newImage);
                $newImg = Image::make($path)->resize(150, 64, function($c){
                    $c->aspectRatio();
                    $c->upsize();
                })->save();

                $client->image = $dbImage;
                $client->imageName = $imageName;
                /* if($request->image->isValid()){
                    $imageName = date('YmdHis') . '.' . $request->image->extension();
                    $dbImage = "media/images/$imageName";
                    $request->image->move(public_path('media/images'), $imageName);
                    $client->image = $dbImage;
                }else{
                    $validator->errors()->add('image','Arquivo invalido');
                } */
                
            }
            $client->ordination = $data['ordination'];
            $client->status = $data['status'];
            $client->name = $data['name'];
            $client->save(); 
        }
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $Client = Client::find($id);
            $Client->delete();

         return redirect()->route('client.index');
    }
}
