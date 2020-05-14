{{-- @extends('site.layout')

@section('title','Blog - Unax')

@section('content') --}}

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{!!asset('assets/css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('assets/css/font-awesome.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('assets/css/fontawesome.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('assets/css/style.css')!!}">
    <link rel="stylesheet" href="{!!asset('assets/css/services.css')!!}">
    {{-- <link rel="stylesheet" href="{!!asset('assets/css/style.css')!!}"> --}}
    {{-- <link rel="icon" href="/templates/unaxsite/site/images/favicons/favicon.ico" type="image/x-icon"> --}}
    <link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/08379a6aba.js" crossorigin="anonymous"></script>
    <title>Unax</title>
</head>
<body>
{{-------------------------------- NAVBAR ---------------------------------}}
<nav class="topo ">
    <div class="fone">
        <a href="tel:+55 (22) 2773-5096"><i class="fa fa-phone fa-flip-horizontal"></i>&nbsp;&nbsp;+55 (22) 2773-5096</a>
    </div>
    <div class="logo">
        <img src="{!!asset($images['logo'])!!}" alt="logo">
    </div>
{{-------------------------------- MENU ---------------------------------}}
    <div class="menu">
        <button class=" btn navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Navegação Toggle">
            <i class="fa fa-bars"></i>
            <div class="menu-area">
                <ul class="socialNetwork">
                    @foreach ($networks as $network)
                    <li class="py-3"><a href="{!!$network->url!!}" target="_blank">{!!$network->icon!!}</i></a></li>
                    @endforeach
                </ul>
                <ul class="midia">
                    <li><a href="/">{{-- <i class="fas fa-home"> --}}</i>&nbsp;&nbsp;&nbsp;Home</a></li>
                    <li><a href="/blog">{{-- <i class="fas fa-blog"> --}}</i>&nbsp;&nbsp;&nbsp;Blog</a></li>
                    <li><a href="https://wa.me/5522992921877" target="_blank"><i class="fab fa-whatsapp"></i>&nbsp;&nbsp;&nbsp;WhatsApp</i></a></li>
                </ul> 
            </div>
        </button>
        <form method="get">
            <select  onChange="this.form.submit()" name="lang" id="lang" class="form-control float-md-right langForm">
                @foreach ($langs as $item)
                    <option {{$lang == $item->lang ?'selected="selected"':''}} value={{$item->lang}}>{{$item->lang}}</option>
                @endforeach
            </select>
        </form>
    </div>
{{-------------------------------- /MENU ---------------------------------}}
</nav>
{{-------------------------------- /NAVBAR ---------------------------------}}
    <div class="container my-4">
          <!-- Button to Open the Modal -->
          @foreach ($blogs as $blog)
              <a class="linkModal" data-toggle="modal" data-target="#myModal{{$blog->id}}">
                  <div class="row modalBlog">
                      <div class="py-4 col-sm-5 divImg">
                          <img class="img-responsive " src="{!!asset($blog->image)!!}">
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
                              <img class="img-responsive img-rounded img-Blog"src="{!!asset($blog->image)!!}">                            
                              <button style="margin-left:-50px" type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body mx-5 px-5">
                              <span class="dateTitle"> {!!$blog->date!!}</span>
                              <h2 class="blogTitle">{{$blog->title}}</h2>
                              {!!$blog->content!!}
                              <div style="text-align:left" class="modal-footer">
                                <div class="row">
                                    <div class="my-3 col-sm-12">
                                        <p>Para mais informações sobre nosso portifólio, entre em contato: </p>
                                    </div>
                                    <div class="col-sm-12">
                                       <p><strong>E-mail:</strong> <a href="mailto:comercial@unax.com.br">comercial@unax.com.br</a></p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p><strong>Telefone:</strong> (22) 2773-5096</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p><strong>WhatsApp:</strong><a href="https://wa.me/5522992921877">(22) 99292-1877</a></p>
                                    </div>                         
                                </div>                              
                              </div>
                          </div>
                      </div>
                  </div>
              </div>                     
          @endforeach
    </div>    
<script type="text/javascript" src="{!!asset('assets/js/jquery.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/bootstrap.bundle.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/jquery.easing.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/script.js')!!}"></script>    
</body>
</html>
{{-- @endsection --}}