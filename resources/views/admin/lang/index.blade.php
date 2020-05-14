@extends('adminlte::page')

@section('title','Idiomas')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
<link rel="stylesheet" href="{!!asset('assets/css/style.css')!!}">
    
@endsection


@section('content_header')
        <div class="row">
            <div class="col-md-6">
                <h1>Idiomas</h1>
            </div>
            <div class="col-md-6">
                <a href="{{route('lang.create')}}" class="btn btn-primary"style="position: block; float:right; margin-bottom:10px;">Adicionar idioma</a>
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
                        <th>Idioma</th>
                        <th width="100">Sigla</th>
                        <th width="100">Ações</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($data as $lang)
                    <tr>
                        <td>{{$lang->id}}</td>
                        <td>{{$lang->name}}</td>
                        <td>{{$lang->lang}}</td>
                    <td><a style="outline: none;text-decoration: none;color: #5555ff;" href="{{route('lang.edit',['lang'=>$lang->id])}}"><i class="fas fa-edit"></i></a>  
                        <form class="d-inline" method="POST" action="{{route('lang.destroy',['lang'=>$lang->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir o idioma: {{$lang->name}}')">
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
   {{-- {{$data->links()}} --}}

@endsection