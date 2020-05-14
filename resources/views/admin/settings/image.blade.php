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
    <div class="col-md-6">
        <h1>Site - Imagens</h1>
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

        <form action="{{route('settings.imagessave')}}" method="POST"class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group row">
                <label class="ml-5 col-sm-2 col-form-label" for="logo">Logo</label>
                <div class="col-sm-6">
                    <input type="file" class="uploadImage form-control-file" name="logo" id="logo">
                    <span style="font-size:10px;">
                        Altura de 120px a 30px | Largura de 300px a 150px | Formato png com fundo trasnparente!
                    </span>
                </div>
                <div class="col-sm-3">
                    <img style="max-width:100px; max-height:100px" class="img-responsive "style=""src="{!!asset($images['logo'])!!}">
                </div>
            </div>
            <div class="form-group row">
                <label class="ml-5 col-sm-2 col-form-label" for="banner">Banner</label>
                <div class="col-sm-6">
                    <input type="file" class="uploadImage form-control-file" name="banner" id="banner">
                    <span style="font-size:10px;">
                        Altura de 1378px a 768px | Largura de 1920px a 1024px | Formato png, jpg e jpeg!
                    </span>
                </div>
                <div class="col-sm-3">
                    <img style="max-width:100px; max-height:100px" class="img-responsive "style=""src="{!!asset($images['banner'])!!}">
                </div>
            </div>
            <div class="form-group row">
                <label class="ml-5 col-sm-2 col-form-label" for="bannerMobile">Banner mobile</label>
                <div class="col-sm-6">
                    <input type="file" class="uploadImage form-control-file" name="bannerMobile" id="bannerMobile">
                    <span style="font-size:10px;">
                        Altura de 1000px a 500px | Largura de 719px a 360px | Formato png, jpg e jpeg!
                    </span>
                </div>
                <div class="col-sm-3">
                    <img style="max-width:100px; max-height:100px" class="img-responsive "style=""src="{!!asset($images['bannerMobile'])!!}">
                </div>
            </div>
            <div class="form-group row">
                <label class="ml-5 col-sm-2 col-form-label" for="footer">Rodapé</label>
                <div class="col-sm-6">
                    <input type="file" class="uploadImage form-control-file" name="footer" id="footer">
                    <span style="font-size:10px;">
                        Altura de 900px a 450px | Largura de 720px a 360px | Formato png, jpg e jpeg!
                    </span>
                </div>
                <div class="col-sm-3">
                    <img style="max-width:100px; max-height:100px" class="img-responsive "style=""src="{!!asset($images['footer'])!!}">
                </div>
            </div>
            {{-- <div class="form-group row">
                <label class="ml-5 col-sm-2 col-form-label" for="footerMobile">Rodapé mobile</label>
                <div class="col-sm-6">
                    <input type="file" class="uploadImage form-control-file" name="footerMobile" id="footerMobile">
                    <span style="font-size:10px;">
                        Altura de 420px a 285px | Largura de 1920px a 1024px | Formato png, jpg e jpeg!
                    </span>
                </div>
                <div class="col-sm-3">
                    <img style="max-width:100px; max-height:100px" class="img-responsive "style=""src="{!!asset($images['footerMobile'])!!}">
                </div>
            </div> --}}
            <button type="submit" class="ml-5 btn btn-success">Salvar</button>
            <a href="{{route('settings')}}" class="btn btn-default float-right">Cancelar</a>
        </form>
    </div>
</div>
@endsection