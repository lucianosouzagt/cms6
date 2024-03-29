<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Lang;
use Highlight\Language;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = $request->input('lang', 'pt-br');
        $langs = Lang::where('active', 1 )->get();
        $blogs = Blog::where('lang',$lang)->orderBy('id', 'desc')->paginate(10);

        return view('admin.blog.index',[
            'blogs'=> $blogs,
            'lang'=> $lang,
            'langs'=> $langs
            
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
        $news = $request->input('news', 0);

        return view('admin.blog.create',[
            'langs'=> $langs,
            'news'=> $news
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
            'news',
            'image',
            'title',
            'description',
            'body'
        ]);
            
        $data['new'] = intval($data['news']);

        $validator = Validator::make($data, [
            'image' => ['required','image','mimes:jpeg,jpg,png','dimensions:max_width=1920,min_width=640,max_height=1378,min_height=459'],
            'title'=>['required','string','max:100'],
            'description'=>['required','string','max:250'],
            'body'=>['required','string']            
        ]);

        $imageName = date('YmdHis') . '.' . $request->image->extension();
        $newImage = $data['image']->storeAs('blogs', $imageName);
        $dbImage = "storage/blogs/$imageName";
        $path = Storage::path($newImage);
        $newImg = Image::make($path)->resize(880, 632, function($c){
            $c->aspectRatio();
            $c->upsize();
        })->save();


        if($validator->fails()){
            return redirect()->route('blog.create')
            ->withErrors($validator)
            ->withInput();
        }
  
        $blog = new Blog;

        if($data['new'] === 1){
            $blog->news = $data['new'];
        }

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
        $langs = Lang::where('active', 1 )->get();
        if($blog){
            return view('admin.blog.edit',[
                'blog'=> $blog,
                'langs'=> $langs
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
                'news',
                'title',
                'body',
                'image'
            ]);

            $data['new'] = intval($data['news']);
           
            $blog->news = $data['new'];
            
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
