<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $langs = $request->input('lang', 'pt-br');
       
        $blogs = Blog::where('lang',$langs)->orderBy('id', 'desc')->paginate(10);

        return view('admin.blog.index',[
            'blogs'=> $blogs,
            'lang'=> $langs
            
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $langs = $request->input('lang', 'pt-br');

        return view('admin.blog.create',[
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
            'image',
            'title',
            'description',
            'body'
        ]);
        if($request->image->isValid()){
            $imageName = date('YmdHms') . '.' . $request->image->extension();
            $dbImage = "media/images/$imageName";
            $request->image->move(public_path('media/images'), $imageName);
            /* $request->image->storeAs('image', $imageName); */
        }

        $validator = Validator::make($data, [
            'title'=>['required','string','max:100'],
            'description'=>['required','string','max:250'],
            'body'=>['required','string']
            
        ]);

        if($validator->fails()){
            return redirect()->route('blog.create')
            ->withErrors($validator)
            ->withInput();
        }

        $blog = new Blog;
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->image = $dbImage;
        $blog->datetime =  date('Y-m-d H:i:s');
        $blog->content = $data['body'];
        $blog->lang = $data['lang'];
        $blog->save();

        return redirect()->route('blog.index');
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
        $blog = Blog::find($id);
        if($blog){
            return view('admin.blog.edit',[
                'blog'=> $blog
            ]);
        }
        return view('blog.index');
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
        $blog = Blog::find($id);
         
        
        if($blog){
            $data = $request->only([
                'lang',
                'title',
                'body',
                'image'
            ]);

            $validator = Validator::make([
                'title'=>$data['title'],
            ],[
                'title'=>['required','string','max:100']
            ]);
            
            if(!empty($data['image'])){
                if($request->image->isValid()){
                    $imageName = date('YmdHms') . '.' . $request->image->extension();
                    $dbImage = "media/images/$imageName";
                    $request->image->move(public_path('media/images'), $imageName);
                    /* $request->image->storeAs('image', $imageName); */
                    $blog->image = $dbImage;
                }else{
                    $validator->errors()->add('image','Arquivo invalido');
                }
                
            }

            $blog->lang = $data['lang'];
            $blog->title = $data['title'];
            $blog->content = $data['body'];
            

            if(count($validator->errors())>0){
                return redirect()->route('blog.edit',[
                    'blog'=>$id
                ])->withErrors($validator);
            }

           $blog->save(); 
        }
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->route('blog.index');
    }
}
