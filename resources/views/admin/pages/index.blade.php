@extends('adminlte::page')

@section('title','Páginas')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection

@section('content_header')
       <div class="ml-4 mr-4">
        <h1>Minhas Páginas
            <a href="{{route('pages.create')}}" class="btn btn-primary"style="position: block; float:right; margin-bottom:10px;">Adicionar nova página</a>
        </h1>
       </div>
@endsection



@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>título</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{$page->id}}</td>
                        <td>{{$page->title}} <br> </td>
                    <td><a style="outline: none;text-decoration: none;color: #55ff55;" href="" target="_blank"><i class="far fa-eye"></i></a>
                        <a style="outline: none;text-decoration: none;color: #5555ff;" href="{{route('pages.edit',['page'=>$page->id])}}"><i class="fas fa-edit"></i></a>  
                    <form class="d-inline" method="POST" action="{{route('pages.destroy',['page'=>$page->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir a página: {{$page->title}}')">
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
    {{$pages->links()}}
@endsection