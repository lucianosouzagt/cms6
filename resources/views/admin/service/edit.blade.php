@extends('adminlte::page')

@section('title','Cadastrar Serviços')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection



{{-- @section('content_header')
        <h1>Cadastro de Usuário</h1>
@endsection --}}



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
        <div class="card-header row">
            <div class="col-sm-6">
                <h3>Cadastro de Serviço</h3>
            </div>
            <div class="col-sm-6">
                <form method="get">
                    
                </form>
            </div>
            
        </div>
        <div class="card-body">
            <form action="{{route('service.update', ['service'=>$service->id])}}" method="POST"class="mt-3 form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                        <label class="ml-4 col-sm-3 col-form-label" for="lang">Selecione o Idioma </label>
                        <div class="col-sm-4">
                            <select style="width:180px" name="lang" id="lang" class="form-control">
                                <option {{$service->lang == 'en' ?'selected="selected"':''}} value="en">English USA</option>
                                <option {{$service->lang == 'pt-br' ?'selected="selected"':''}} value="pt-br">Português Brasil</option>
                            </select>
                        </div>
                        <label class="ml-4 col-sm-2 col-form-label" for="status">Status</label>
                        <div class="col-sm-2">                            
                            <select style="width:100px" name="status" id="status" class="form-control">
                                <option selected="selected"value= 1 >Ativo</option>
                                <option value= 0 >Inativo</option>
                            </select>
                        </div>     

                </div>
                <div class="form-group row">
                    <label for="bgcolor" class="ml-4 col-sm-3 col-form-label">Cor do Site</label>
                    <div class="col-sm-1">
                        <input type="color" class="form-control" name="bgcolor" id="bgcolor" value="{{$service->bgcolor}}">
                    </div>
                    <label for="bgcolor" class="ml-4 col-sm-3 col-form-label"></label>
                    <label for="textcolor" class=" col-sm-2 col-form-label">Cor do Texto</label>
                    <div class="col-sm-1">
                        <input type="color" class="form-control"name="textcolor" id="textcolor"value="{{$service->textcolor}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="ml-4 col-sm-2 col-form-label" for="image">Imagem</label>
                    <div class="col-sm-6">
                        <input type="file" class="uploadImage form-control-file" name="image" id="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="ml-4 col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$service->title}}" placeholder="Digite o título do serviço">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="subtitle" class="ml-4 col-sm-2 col-form-label">Sub-título</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="subtitle" value="{{$service->subtitle}}" placeholder="Digite o sub-título do serviço">
                    </div>
                </div>
                <div class="form-group row">       
                    <label for="email" class="ml-4 col-sm-2 col-form-label">Conteúdo</label>
                    <div class="col-sm-8">
                        <textarea name="body" class="form-control bodyfield" id="body" rows="8">{{$service->content}}</textarea>
                    </div>
                </div> 
                <button type="submit" class="ml-5 mt-2 btn btn-success">Salvar</button>
                <a href="{{route('service.index')}}" class="btn btn-default float-right">Cancelar</a>
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
        toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table |link image | bullist numlist',
        content_css:[
            '{{asset('assets/css/content.css')}}'
        ],
        images_upload_url:'{{route('imageupload')}}',
        images_upload_credentials:true,
        convert_urls:false
    });
</script>
@endsection