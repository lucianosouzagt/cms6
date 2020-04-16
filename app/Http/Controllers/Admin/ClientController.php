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
            'image'
        ]);

        if($request->image->isValid()){
            $imageName = date('YmdHms') . '.' . $request->image->extension();
            $dbImage = "media/images/$imageName";
            $request->image->move(public_path('media/images'), $imageName);
        }

        $client = new Client;
        $client->status = $data['status'];
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
                'image'
            ]);
            
            if(!empty($data['image'])){
                if($request->image->isValid()){
                    $imageName = date('YmdHms') . '.' . $request->image->extension();
                    $dbImage = "media/images/$imageName";
                    //$request->image->move(public_path('media/images'), $imageName);
                    $photo = $request->image->storeAs('image', $imageName);
                    $path = Storage::path($photo);
                    $newImage = Image::make($path)->resize(100, 100, function($c){
                        $c->aspectRatio();
                        $c->upsize();                       
                    })->save();
                    $client->image = $dbImage;
                }else{
                    $validator->errors()->add('image','Arquivo invalido');
                }
                
            }

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
        //
    }
}
