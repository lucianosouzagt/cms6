@extends('adminlte::page')

@section('title','Cadastrar Blog')

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
                <h3>Cadastro de Clinte para o site</h3>
            </div>
            <div class="col-sm-6">
                <form method="get">
                    
                </form>
            </div>
            
        </div>
        <div class="card-body">
            <form action="{{route('client.store')}}" method="POST"class="mt-3 form-horizontal" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label class="ml-5 col-sm-2 col-form-label" for="status">Status</label>
                    <div class="col-sm-2">                            
                        <select style="width:100px" name="status" id="status" class="form-control">
                            <option selected="selected"value= 1 >Ativo</option>
                            <option value= 0 >Inativo</option>
                        </select>
                    </div> 
                </div>
                <div class="form-group row">
                    <label for="name" class="ml-5 col-sm-2 col-form-label">Cliente</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="name" id="name" value="{{old('title')}}" placeholder="Digite o nome do Cliente">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="ml-5 col-sm-2 col-form-label" for="image">Imagem</label>
                    <div class="col-sm-6">
                        <input type="file" class="uploadImage form-control-file" name="image" id="image">
                    </div>
                </div>
                <button type="submit" class="ml-5 mt-2 btn btn-success">Cadastrar</button>
                <a href="{{route('blog.index')}}" class="btn btn-default float-right">Cancelar</a>
            </form>
        </div>
    </div>
@endsection