@extends('adminlte::page')

@section('title','idiomas')

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
                <h3>Idiomas - Editar</h3>
            </div>
            <form action="{{route('lang.update',['lang'=>$lang->id])}}" method="POST"class="mt-3 form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group row">
                    <div class="col-sm-2">                            
                        <select style="width:110px" name="status" id="status" class="form-control">
                            <option {{$lang->status == 1 ?'selected="selected"':''}} value= 1 >Ativo</option>
                            <option {{$lang->status == 0 ?'selected="selected"':''}} value= 0 >Inativo</option>
                        </select>
                    </div>
                    <label for="name" class="ml-5 col-sm-1 col-form-label">Idioma</label>
                    <div  class="col-sm-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$lang->name}}" placeholder="Digite o nome do idioma">
                    </div>
                    <label for="name" class="ml-5 col-sm-1 col-form-label">Sigla</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control @error('sigla') is-invalid @enderror" name="sigla" id="sigla" value="{{$lang->lang}}" placeholder="Digite a sigla do idioma">
                    </div>
                
                    
                </div>
                <button type="submit" class="ml-5 mt-2 btn btn-success">Salvar</button>
                <a href="{{route('lang.index')}}" class="btn btn-default float-right">Cancelar</a>
            </form>
        </div>
    </div>
@endsection