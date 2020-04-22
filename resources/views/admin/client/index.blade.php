@extends('adminlte::page')

@section('title','Clientes')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
<link rel="stylesheet" href="{!!asset('assets/css/style.css')!!}">
    
@endsection


@section('content_header')
        <div class="row">
            <div class="col-md-6">
                <h1>Clientes</h1>
            </div>
            <div class="col-md-6">
                <a href="{{route('client.create')}}" class="btn btn-primary"style="position: block; float:right; margin-bottom:10px;">Adicionar cliente</a>
            </div>
        </div>
@endsection



@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="80">ID</th>
                        <th>Cliente</th>
                        <th width="50">Ordenação</th>
                        <th width="100">Ações</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->ordenation}}</td>
                    <td><a style="outline: none;text-decoration: none;color: #5555ff;" href="{{route('client.edit',['client'=>$client->id])}}"><i class="fas fa-edit"></i></a>  
                    <form class="d-inline" method="POST" action="{{route('client.destroy',['client'=>$client->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir a página: {{$client->name}}')">
                            @csrf
                            @method('DELETE')
                           
                                <button style="border:none; background:transparent;color: #ff5555;"><i class="far fa-trash-alt" onclick="false"></i></button>
                            
                        </form>
                    </td>
                </tr>        
                @endforeach
               </tbody>
            
            </table>
        </div>
    </div>
    {{$clients->links()}}

@endsection