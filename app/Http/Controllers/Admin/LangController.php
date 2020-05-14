<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lang;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lang::all();

        return view('admin.lang.index',[
            'data'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $langs = Lang::where('lang',$data['sigla']);
        if($langs){
            echo"idioma la cadastrado.";
        }

        $lang = new Lang;
        $lang->name = $data['name'];
        $lang->lang = $data['sigla'];
        $lang->active = $data['status'];
        $lang->save();

        return redirect()->route('lang.index');
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
        $lang = Lang::find($id);

        if($lang){
            return view('admin.lang.edit',[
                'lang'=> $lang
            ]);
        }
        return view('lang.index');
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
        $lang = Lang::find($id);
        $data = $request->all();

        $lang->name = $data['name'];
        $lang->lang = $data['sigla'];
        $lang->active = $data['status'];
        $lang->save();

        return redirect()->route('lang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lang = Lang::find($id);
        $lang->delete();

        return redirect()->route('lang.index');
    }
}
