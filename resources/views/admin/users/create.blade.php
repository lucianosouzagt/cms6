@extends('adminlte::page')

@section('title','Cadastrar Usuário')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection

@section('content')

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
            <div class="card-header">
                <h3>Usuário - Cadastro</h3>
            </div>
            <form action="{{route('users.store')}}" method="POST"class="mt-3 form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="name" class="ml-5 col-sm-2 col-form-label">Nome completo</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Digite seu nome completo">
                    </div>
                </div>
                <div class="form-group row">       
                    <label for="email" class="ml-5 col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="Digite seu e-mail">
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="password" class="ml-5 col-sm-2 col-form-label">Senha</label>
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
                <div class="form-group row">
                    <label class="ml-5 col-sm-2 col-form-label" for="admin">Tipo de usuário</label>
                        <div class="col-sm-2">
                            <select style="width:160px" name="admin" id="admin" class="form-control">
                                <option selected="selected" value= 0 >Usuário</option>
                                <option value= 1 >Administrador</option>
                            </select>
                        </div>
                </div>    
                <button type="submit" class="ml-5 mt-2 btn btn-success">Cadastrar</button>
                <a href="{{route('users.index')}}" class="btn btn-default float-right">Cancelar</a>
            </form>
        </div>
    </div>
@endsection