@extends('adminlte::page')

@section('title', 'Configurações')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection

@section('content_header')
    <style>
        .tox-notifications-container{ 
            display: none !important; 
        }
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
    <div class="row">
        <div class="col-sm-6">
            <h1>Site - Informações Gerais</h1>
        </div>
        <div class="col-sm-3">
            <form method="get">
                <select style="width:160px; height:35px" onChange="this.form.submit()" name="lang" id="lang" class="form-control float-md-right">
                    @foreach ($langs as $item)
                        <option {{$lang == $item->lang ?'selected="selected"':''}} value={{$item->lang}}>{{$item->name}}</option>                        
                    @endforeach
                </select>
            </form>
        </div>
        <div class="col-sm-3">
            <a href="{{route('settings.create')}}" class="btn btn-primary"style="position: block; float:right; margin-bottom:10px;">Adicionar informações novo idioma</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
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
            <form action="{{route('settings.save')}}" method="POST"class="form-horizontal">
                @csrf
                @method('PUT')
                <input type="hidden" name="langs" value="{{$settings['langs']}}">
                <div class="form-group row">
                    <label for="clientTitle" class="ml-5 col-sm-2 col-form-label">Título setor cliente</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="clientTitle" id="clientTitle" value="{{$settings['clientTitle']}}" placeholder="Exemplo: Titulo do Site">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="more" class="ml-5 col-sm-2 col-form-label">Saiba mais</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="more" id="more" value="{{$settings['more']}}" placeholder="Exemplo: Titulo do Site">
                    </div>
                </div>
                <div class="form-group row">       
                    <label for="about" class="ml-5 col-sm-2 col-form-label">Sobre reduzido</label>
                    <div class="col-sm-8">
                        <textarea name="about" class="form-control titlefield" id="about" rows="4">{{$settings['about']}}</textarea>
                    </div>
                </div> 
                <div class="form-group row">       
                    <label for="aboutContent" class="ml-5 col-sm-2 col-form-label">Sobre completo</label>
                    <div class="col-sm-8">
                        <textarea name="aboutContent" class="form-control bodyfield" id="aboutContent" rows="8">{{$settings['aboutContent']}}</textarea>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="contact" class="ml-5 col-sm-2 col-form-label">Título contato</label>
                    <div class="col-sm-8">
                        <input type="contact" class="form-control" name="contact" id="contact" value="{{$settings['contact']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="ml-5 col-sm-2 col-form-label">E-mail de contato</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" id="email" value="{{$settings['email']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telefone" class="ml-5 col-sm-2 col-form-label">Telefone de contato</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="telefone" id="telefone" value="{{$settings['telefone']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="maps" class="ml-5 col-sm-2 col-form-label">URL Google Maps</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="maps" id="maps" value="{{$settings['maps']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="ml-5 col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="address" id="address" value="{{$settings['address']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="district" class="ml-5 col-sm-2 col-form-label">Bairro</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"name="district" id="district" value="{{$settings['district']}}">
                    </div>
                    <label for="zipcode" class="col-sm-1 col-form-label"></label>
                    <label for="zipcode" class="col-sm-1 col-form-label">CEP</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="zipcode" id="zipcode" value="{{$settings['zipcode']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="ml-5 col-sm-2 col-form-label">Cidade</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="city" id="city" value="{{$settings['city']}}">
                    </div>
                    <label for="state" class=" col-sm-1 col-form-label"></label>
                    <label for="state" class=" col-sm-2 col-form-label">Estado</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control"name="state" id="state" value="{{$settings['state']}}">
                    </div>
                </div>      
                <button type="submit" class="ml-5 btn btn-success">Salvar</button>
                <a href="{{route('settings')}}" class="btn btn-default float-right">Cancelar</a>
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
        selector:'textarea.titlefield',
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