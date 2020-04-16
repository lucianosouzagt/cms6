@extends('adminlte::page')

@section('title','Editar Página')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection

{{-- @section('content_header')
        <h1>Cadastro de Usuário</h1>
@endsection --}}



@section('content')
    <style>
        .tox-notifications-container{ display: none !important; }
    </style>

    @if($errors->any())
        <div class="row">
            <div class="ml-5 col-sm-8 alert alert-danger alert-dismissible">
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
        <div class="card-header">
            <h3>Editar Página</h3>
        </div>
        <div class="card-body">
            <form action="{{route('pages.update', ['page'=>$page->id])}}" method="POST"class="mt-3 form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="title" class="ml-5 col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$page->title}}" placeholder="Digite o título da página">
                    </div>
                </div>
                <div class="form-group row">       
                    <label for="email" class="ml-5 col-sm-2 col-form-label">Conteúdo</label>
                    <div class="col-sm-8">
                        <textarea name="body" class="form-control bodyfield" id="body" rows="8">{{$page->body}}</textarea>
                    </div>
                </div>
                <button type="submit" class="ml-5 mt-2 btn btn-success">Salvar</button>
                <a href="{{route('pages.index')}}" class="btn btn-default float-right">Cancelar</a>
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