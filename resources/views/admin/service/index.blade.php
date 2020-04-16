@extends('adminlte::page')

@section('title','Serviços')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection


@section('content_header')
        <div class="row">
            <div class="col-md-6">
                <h1>Serviços</h1>
            </div>
            <div class="col-md-2">
                <form method="get">
                    <select style="width:90px; height:35px" onChange="this.form.submit()" name="lang" id="lang" class="form-control float-md-right">
                        <option {{$lang == 'en' ?'selected="selected"':''}} value="en">En</option>
                        <option {{$lang == 'pt-br' ?'selected="selected"':''}} value="pt-br">Pt-BR</option>
                    </select>
                </form>
            </div>
            <div class="col-sm-4">
                <a href="{{route('service.create')}}" class="btn btn-primary"style="position: block; float:right; margin-bottom:10px;">Adicionar novo Serviço</a>
            </div>
        </div>
@endsection



@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>Título</th>
                        <th width="100">Idioma</th>
                        <th style="text-align:center" width="100">Visível</th>
                        <th width="100">Ações</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->title}}</td>
                        <td>{{$service->lang}}</td>
                        <td style="text-align:center">
                            @if($service->status == 1)
                            <a style="outline: none;text-decoration: none;color: #777777;" href="{{route('service.done',['id'=>$service->id])}}"><i style="font-size: 16pt;"class="far fa-eye"></i></a>
                            @else
                            <a style="outline: none;text-decoration: none;color: #666666;" href="{{route('service.done',['id'=>$service->id])}}"><i style="font-size: 16pt;" class="far fa-eye-slash"></i></a> 
                            @endif
                        </td>
                    <td><a style="outline: none;text-decoration: none;color: #5555ff;" href="{{route('service.edit',['service'=>$service->id])}}"><i class="fas fa-edit"></i></a>  
                    <form class="d-inline" method="POST" action="{{route('service.destroy',['service'=>$service->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir a página: {{$service->title}}')">
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
    {{$services->links()}}
@endsection