@extends('site.layout')

@section('title','Blog')

@section('content')


    <div class="container my-4">
        <div class="row">
            <div class="col-sm-12">
                <form method="get">
                    <select style="width:90px; height:35px" onChange="this.form.submit()" name="lang" id="lang" class="form-control float-md-right">
                        <option {{$lang == 'en' ?'selected="selected"':''}} value="en">En</option>
                        <option {{$lang == 'pt-br' ?'selected="selected"':''}} value="pt-br">Pt-BR</option>
                    </select>
                </form>
            </div>
        </div>
          <!-- Button to Open the Modal -->
          @foreach ($blogs as $blog)
              <a class="linkModal" data-toggle="modal" data-target="#myModal{{$blog->id}}">
                  <div class="my-5 row">
                      <div class="p-4 col-sm-5 divImg">
                          <img class="img-responsive "style=""src="{!!asset($blog->image)!!}">
                      </div>
                      <div class="p-4 col-sm-7 divBody">
                          <h2 class="blogTitle mb-5">
                              <span class="dateTitle"> {!!$blog->date!!}</span><br>
                              {{$blog->title}}
                          </h2>

                          <div class="deskBlog">
                              <p>{{$blog->description}}</p>
                          </div>
                      </div>
                  </div>
              </a>
          @endforeach
          @foreach ($blogs as $blog)
              <div class="modal " id="myModal{{$blog->id}}">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <img style="margin-left:-12px" class="img-responsive img-rounded"src="{!!asset($blog->image)!!}">                            
                              <button style="margin-left:-50px" type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                              <span class="dateBody"> {!!$blog->date!!}</span>
                              <h2 class="blogTitle">{{$blog->title}}</h2>
                              <h3 class="titleDesc py-3">{{$blog->description}}</h3>
                               
                              <hr>                
                              <p class="py-4">{!!$blog->content!!}</p>
                          </div> 
                          <div style="text-align:left" class="modal-footer">
                            <div class="row">
                                <div class="ml-5 pl-5 my-3 col-sm-12">
                                    <p>Para mais informações sobre nosso portifólio, entre em contato: </p>
                                </div>
                                <div class="ml-5 pl-5 my-3 col-sm-12">
                                   <p><strong>E-mail:</strong> <a href="mailto:comercial@unax.com.br">comercial@unax.com.br</a></p>
                                </div>
                                <div class="ml-5 pl-5 my-3 col-sm-12">
                                    <p><strong>Telefone:</strong> (22) 2773-5096</p>
                                </div>
                                <div class="ml-5 pl-5 my-3 col-sm-12">
                                    <p><strong>WhatsApp:</strong><a href="https://wa.me/5522992921877">(22) 99292-1877</a></p>
                                </div>                         
                            </div>                              
                          </div>   
                      </div>
                  </div>
              </div>                     
          @endforeach
    </div>    

   

       


@endsection
    