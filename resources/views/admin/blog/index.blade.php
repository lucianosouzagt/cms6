@extends('adminlte::page')

@section('title','Blog')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
<link rel="stylesheet" href="{!!asset('assets/css/style.css')!!}">
    
@endsection


@section('content_header')
        <div class="row">
            <div class="col-md-6">
                <h1>Blog</h1>
            </div>
            <div class="col-md-3">
                <form method="get">
                    <select style="width:90px; height:35px" onChange="this.form.submit()" name="lang" id="lang" class="form-control float-md-right">
                        <option {{$lang == 'en' ?'selected="selected"':''}} value="en">En</option>
                        <option {{$lang == 'pt-br' ?'selected="selected"':''}} value="pt-br">Pt-BR</option>
                    </select>
                </form>
            </div>
            <div class="col-sm-3">
                <a href="{{route('blog.create')}}" class="btn btn-primary"style="position: block; float:right; margin-bottom:10px;">Adicionar nova página</a>
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
                        <th width="150">Ações</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->lang}}</td>
                    <td><a style="outline: none;text-decoration: none;color: #55ff55;" href=""class="linkModal" data-toggle="modal" data-target="#myModal{{$blog->id}}"><i class="far fa-eye"></i></a>
                        <a style="outline: none;text-decoration: none;color: #5555ff;" href="{{route('blog.edit',['blog'=>$blog->id])}}"><i class="fas fa-edit"></i></a>  
                    <form class="d-inline" method="POST" action="{{route('blog.destroy',['blog'=>$blog->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir a página: {{$blog->title}}')">
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
    {{$blogs->links()}}

            @foreach ($blogs as $blog)
              <div class="modal fade" id="myModal{{$blog->id}}">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">                          
                          <div class="modal-body row">
                            <div class="modal-header">
                                <div class="row">                                
                                    <div class="col-sm-12">
                                        <button style="margin-left:-50px" type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3>Capa</h3>
                                    </div>
                                    <div class="mb-3 col-sm-12 row">
                                        <div class="p-4 col-sm-5 divImg d-flex justify-content-center">
                                            <img class="img-responsive "style="width:100%; max-height:200px"src="{!!asset($blog->image)!!}">
                                        </div>
                                        <div class=" col-sm-7 divBody">
                                            <h2 class="blogTitle">
                                                <span class="dateTitle"> {!!$blog->date!!}</span><br>
                                                {{$blog->title}}
                                            </h2>          
                                            <div class="deskBlog">
                                                <p>{{$blog->description}}</p>
                                            </div>                                    
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="py-3 col-sm-12">
                                <h3>Conteúdo</h3>
                            </div>
                            <div class="col-sm-12">
                                <img width="100%" class="img-responsive img-rounded"src="{!!asset($blog->image)!!}">                            
                            </div>
                            <div class="col-sm-12">
                                <span class="dateBody"> {!!$blog->date!!}</span>
                                <h2 class="mt-3 blogTitle">{{$blog->title}}</h2>
                                <h3 class="titleDesc py-3">{{$blog->description}}</h3>
                                 
                                <hr>                
                                <p class="py-3">{!!$blog->content!!}</p>
                            </div> 
                            <div style="text-align:left" class="modal-footer">
                                <div class="row">
                                    <div class="ml-5 pl-3 col-sm-12">
                                        <p>Para mais informações sobre nosso portifólio, entre em contato: </p>
                                    </div>
                                    <div class="ml-5 pl-3 col-sm-12">
                                       <p><strong>E-mail:</strong> <a href="mailto:comercial@unax.com.br">comercial@unax.com.br</a></p>
                                    </div>
                                    <div class="ml-5 pl-3 col-sm-12">
                                        <p><strong>Telefone:</strong> (22) 2773-5096</p>
                                    </div>
                                    <div class="ml-5 pl-3 col-sm-12">
                                        <p><strong>WhatsApp:</strong><a href="https://wa.me/5522992921877">(22) 99292-1877</a></p>
                                    </div>                         
                                </div>                              
                              </div>               
                          </div> 
                      </div>
                  </div>
              </div>                     
          @endforeach










@endsection