{{-- @extends('site.layout')

@section('title','Pagina Home')

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
                    <li class="py-3"><a href="{!!$network->url!!}" target="_blank">{!!$network->icon!!}</a></li>
                    @endforeach
                </ul>
                <ul class="midia">
                    <li><a href="/">{{-- <i class="fas fa-home"> --}}</i>&nbsp;&nbsp;&nbsp;Home</a></li>
                    <li><a href="/cms/public/blog">{{-- <i class="fas fa-blog"> --}}</i>&nbsp;&nbsp;&nbsp;Blog</a></li>
                    <li><a href="https://wa.me/5522992921877" target="_blank"><i class="fab fa-whatsapp"></i>&nbsp;&nbsp;&nbsp;WhatsApp</i></a></li>
                </ul> 
            </div>
        </button>
        <form method="get">
            <select  onChange="this.form.submit()" name="lang" id="lang" class="form-control float-md-right langForm">
                @foreach ($langs as $item)
                    <option style="background-image: url('http://localhost:8000/storage/site/pt-br.png') !important;" {{$lang == $item->lang ?'selected="selected"':''}} value={{$item->lang}}>{{$item->lang}}</option>
                @endforeach
            </select>
        </form>
    </div>
{{-------------------------------- /MENU ---------------------------------}}
</nav>
{{-------------------------------- /NAVBAR ---------------------------------}}

{{-------------------------------- BANNER ---------------------------------}}
<div class="banner">
    <picture>
        <source media="(max-width: 480px)" srcset="{!!asset($images['bannerMobile'])!!}">
        <img src="{!!asset($images['banner'])!!}" alt="banner">
    </picture>    
</div>
{{-------------------------------- /BANNER ---------------------------------}}

{{-------------------------------- SOBRE MIM ---------------------------------}}
<div class="about container">
    <p>
        {!!$settings['about']!!}
        <br><br>
        <a href="" class="link"><i class="far fa-arrow-alt-circle-right"></i>&nbsp;{!!$settings['more']!!}</a>
    </p>
       
       
       <hr class="my-4">
</div>
{{-------------------------------- /SOBRE MIM ---------------------------------}}

{{-------------------------------- NOTICIAS HEADER ---------------------------------}}
<div class="carousel-body">
    <div id="carouselSlide" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
            @foreach ($news as $new)
                <li data-target="#carouselSlide" data-slide-to="{{$new->item}}"class="{{$new->item == 0 ?'active':''}} "></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($news as $new)
                <div style="white-space: normal" class="carousel-item {{$new->item == 0 ?'active':''}} linkModal" data-toggle="modal" data-target="#myModal{{$new->item}}">
                    <div class="news row">
                        <div class="title col-md-6">
                            <div class="captions">
                                <div class="captions-item">
                                    <h1><strong>{{$new->title}}</strong></h1>
                                    <p class="ml-3">{{$new->description}}</p><br>
                                    <a style="" href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;{!!$settings['more']!!}</a>
                                </div>
                            </div>
                        </div>
                        <div class="img col-md-6">
                            <img src="{{$new->image}}" class=" news-img img-responsive float-right"alt="">   
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-------------------------------- /NOTICIAS HEADER ---------------------------------}}

{{-------------------------------- NOTICIAS MODAL -------------------------------}}
@foreach ($news as $new)
    <div class="comtainer">
        <div class="modal " id="myModal{{$new->item}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <img class="img-responsive img-rounded img-newsModal"src="{!!asset($new->image)!!}">                          
                        <button style="margin-left:-50px" type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body mx-5 px-5">
                        <span class="dateBody"> {!!$new->date!!}</span>
                        <h2 class="blogTitle">{{$new->title}}</h2>
                        <p class="py-1">{!!$new->content!!}</p>
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
    </div>
@endforeach
{{-------------------------------- /NOTICIAS MODAL ---------------------------------}}

{{--------------------------------- SERVIÇOS ---------------------------------}}
<div class="container service">
    <div class="grid-container">
        @foreach ($services as $service)
            <div style="background-color:{{$service->bgcolor}}; color:{{$service->textcolor}};" class="zoom div{{$service->item}} item{{$service->item}} linkModal" data-toggle="modal" data-target="#myModalService{{$service->item}}">
                    <img style="" class="img-responsive" src="{!!asset($service->imageHeader)!!}" alt="">
                    <h3 class="text-item">{{$service->title}}
                    <br><span>{{$service->subtitle}}</span></h3>
            </div>
        @endforeach
    </div>
</div>
@foreach ($services as $service)
    <div class="modal" id="myModalService{{$service->item}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body row">
                    <div class="col-sm-6 pl-3">
                        <img class="img-responsive" src="{!!asset($service->imageBody)!!}" alt="">
                    </div>
                    <div class="col-sm-6 p-3">   
                        <button style="margin-left:-50px" type="button" class="close" data-dismiss="modal">&times;</button> 
                        <p class="py-4">{!!$service->content!!}</p>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endforeach 
{{-------------------------------- /SERVIÇOS ---------------------------------}}

{{--------------------------------- CLIENTES ---------------------------------}}
<section class="clients">
    <div class="container divClients">
        <h2 class="subtitle">{!!$settings['clientTitle']!!}</h2>
        <ul>
            @foreach ($clients as $client)
            <li><img class="img-responsive" src="{!!asset($client->image)!!}" alt="{!!$client->name!!}" /></li>
            @endforeach
        </ul>
    </div>
</section>
{{-------------------------------- /CLIENTES ---------------------------------}}

{{--------------------------------- FOOTER ---------------------------------}}
<footer>
{{------------------------------ FOOTER CONTATO ------------------------------}}
    <section class="contact">
        <picture>
            {{-- <source media="(max-width: 760px)" srcset="{!!asset($images['footerMobile'])!!}"> --}}
            <img class="img-responsive float-right" src="{!!asset($images['footer'])!!}" alt="footer">       
        </picture>
        <div class="contact-box">
            <p class="subtitle"> {!!$settings['contact']!!}</p>
            <p>
                <a class="links" href="tel:{!!$settings['telefone']!!}">
                    <span>
                        <i class="fa fa-phone fa-flip-horizontal"></i>&nbsp;&nbsp;
                        {!!$settings['telefone']!!}
                    </span>
                </a>
            <br>
                <a class="links" href="mailto:{!!$settings['email']!!}">
                    <span>
                        <i class="far fa-envelope"></i>&nbsp;&nbsp;
                        {!!$settings['email']!!}
                    </span>
                </a>
            </p>
            <a class="address-text" href="{!!$settings['maps']!!}" target="_blank">
                {!!$settings['address']!!} <br />
                {!!$settings['district']!!}, {!!$settings['city']!!} – {!!$settings['state']!!}<br />
                CEP: {!!$settings['zipcode']!!}
            </a>
        </div>
    </section>
{{----------------------------- /FOOTER CONTATO ------------------------------}}

{{------------------------------- REDES SOCIAIS ------------------------------}}
    <div id="footer">
        <ul class="socialNetworkFooter">
            @foreach ($networks as $network)
            <li><a href="{!!$network->url!!}" target="_blank">{!!$network->icon!!}</i></a></li>
            @endforeach
        </ul>
        <hr>
        <p class="copyrights" ><i class="far fa-copyright"></i> Copyright 2020 Unax Offshore</p>
    </div>
{{------------------------------ /REDES SOCIAIS ------------------------------}}
</footer>
{{-------------------------------- /FOOTER ---------------------------------}}
<script type="text/javascript" src="{!!asset('assets/js/jquery.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/bootstrap.bundle.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/jquery.easing.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/script.js')!!}"></script>    
</body>
</html>    

    