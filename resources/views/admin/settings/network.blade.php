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
        <h1>Site - Redes Sociais</h1>
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

            <form action="{{route('settings.networksave')}}" method="POST"class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="youtube" class="ml-5 col-sm-2 col-form-label">Youtube</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="youtube" id="youtube" value="{{$networks['youtube']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="facebook" class="ml-5 col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{$networks['facebook']}}">
                    </div>
                </div>
                <div class="form-group row">       
                    <label for="instagram" class="ml-5 col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="instagram" id="instagram" value="{{$networks['instagram']}}">
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="linkedin" class="ml-5 col-sm-2 col-form-label">Linkedin</label>
                    <div class="col-sm-8">
                        <input type="linkedin" class="form-control" name="linkedin" id="linkedin" value="{{$networks['linkedin']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="googleplus" class="ml-5 col-sm-2 col-form-label">Google Plus</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"name="googleplus" id="googleplus" value="{{$networks['googleplus']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pinterest" class="ml-5 col-sm-2 col-form-label">Pinterest</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="pinterest" id="pinterest" value="{{$networks['pinterest']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="whatsapp" class="ml-5 col-sm-2 col-form-label">WhatsApp</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{$networks['whatsapp']}}">
                    </div>
                </div>
                <button type="submit" class="ml-5 btn btn-success">Salvar</button>
                <a href="{{route('settings')}}" class="btn btn-default float-right">Cancelar</a>
            </form>
        </div>
    </div>    
@endsection