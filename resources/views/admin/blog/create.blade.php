@extends('adminlte::page')

@section('title','Blog')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection

@section('content')
    <style>
        .tox-notifications-container{ display: none !important; }
        .uploadImage{
            display: block; width: 100%;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            box-shadow: inset 0 0 0 transparent;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>

    @if($errors->any())
        <div class="row">
            <div class="mr-5 col-sm-8 alert alert-danger alert-dismissible">
                <ul>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>  
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>   
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="card-header row">
                <h3>Blog - Cadastro</h3>            
            </div>
            <form action="{{route('blog.store')}}" method="POST"class="mt-3 form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="ml-5 col-sm-2 col-form-label" for="lang">Selecione o Idioma </label>
                    <div class="col-sm-2">
                        <select style="width:165px" name="lang" id="lang" class="form-control">
                            @foreach ($langs as $lang)
                                <option value={{$lang->lang}}>{{$lang->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="ml-5 col-sm-4 col-form-label" for="news">Deseja mostrar esse Blog na Pagina Inicial?</label>
                    <div class="col-sm-1">
                        <select style="width:110px" name="news" id="news" class="form-control">
                            <option selected="selected" value=0 >Não</option>
                            <option value=1 >Sim</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="ml-5 col-sm-2 col-form-label" for="image">Imagem</label>
                    <div class="col-sm-8">
                        <input type="file" class="uploadImage form-control-file" name="image" id="image">
                        <span style="font-size:10px;">
                            Altura de 1378px a 459px | Largura de 1920px a 640px | Formato png, jpg e jpeg!
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="ml-5 col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" placeholder="Digite o título do blog">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="ml-5 col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-8">
                        <textarea name="description" class="form-control descfield" id="description" rows="4">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="form-group row">       
                    <label for="email" class="ml-5 col-sm-2 col-form-label">Conteúdo</label>
                    <div class="col-sm-8">
                        <textarea name="body" class="form-control bodyfield" id="body" rows="8">{{old('body')}}</textarea>
                    </div>
                </div> 
                <button type="submit" class="ml-5 mt-2 btn btn-success">Cadastrar</button>
                <a href="{{route('blog.index')}}" class="btn btn-default float-right">Cancelar</a>
            </form>
        </div>
    </div>


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>

    tinymce.init({
        selector:'textarea.bodyfield',
        height:300,
        menubar:false,
        plugins:['link','table','image','lists'],
        toolbar:'undo redo | formatselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | table |link image | bullist numlist',
        content_css:[
            '{{asset('assets/css/content.css')}}'
        ],
        images_upload_url:'{{route('imageupload')}}',
        images_upload_credentials:true,
        convert_urls:false
    });

    tinymce.init({
        selector:'textarea.descfield',
        height:150,
        menubar:false,
        plugins:['link','table','image','lists'],
        toolbar:'undo redo | formatselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | table |link image | bullist numlist',
        content_css:[
            '{{asset('assets/css/content.css')}}'
        ],
        images_upload_url:'{{route('imageupload')}}',
        images_upload_credentials:true,
        convert_urls:false
    });
</script>
@endsection