@extends('adminlte::page')

@section('title','Usuários')
@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection



@section('content_header')
       <div class="ml-4 mr-4">
        <h1>Meus Usuários
            <a href="{{route('users.create')}}" class="btn btn-primary"style="position: block; float:right; margin-bottom:10px;">Adicionar novo Usuário</a>
        </h1>
       </div>
@endsection



@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}} <br> </td>
                        <td>{{$user->email}}</td>
                    <td><a style="outline: none;text-decoration: none;color: #5555ff;" href="{{route('users.edit',['user'=>$user->id])}}"><i class="fas fa-edit"></i></a>  
                    <form class="d-inline" method="POST" action="{{route('users.destroy',['user'=>$user->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir o usuário: {{$user->name}}')">
                            @csrf
                            @method('DELETE')
                           
                                <button style="border:none; background:transparent;color: #ff5555;" @if($loggedId === intval($user->id)) disabled @endif><i class="far fa-trash-alt" onclick="false"></i></button>
                            
                        </form>
                    </td>
                </tr>        
                @endforeach
               </tbody>
            
            </table>
        </div>
    </div>
    {{$users->links()}}
@endsection