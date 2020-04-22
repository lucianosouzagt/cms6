@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection

@section('content_header')
    <div class="">
        <h1>Meu perfil</h1>
    </div>
@endsection

@section('content')

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
    @if(session('warning'))
        <div class="row">
            <div class="ml-5 col-sm-8 alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> {{session('warning')}}</h5>  
                
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('profile.save')}}" method="POST"class="mt-3 form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="ml-5 col-sm-2 col-form-label">Nome completo</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$user->name}}" placeholder="Digite seu nome completo">
                    </div>
                </div>
                <div class="form-group row">       
                    <label for="email" class="ml-5 col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$user->email}}" placeholder="Digite seu e-mail">
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="password" class="ml-5 col-sm-2 col-form-label">Nova senha</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Digite sua senha">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_confirmation" class="ml-5 col-sm-2 col-form-label">Confirme sua senha</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha">
                    </div>
                </div>     
                <button type="submit" class="ml-5 mt-2 btn btn-success">Salvar</button>
                <a href="{{route('users.index')}}" class="btn btn-default float-right">Cancelar</a>
            </form>
        </div>
    </div>
@endsection