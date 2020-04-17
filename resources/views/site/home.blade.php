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
    <link rel="stylesheet" href="{!!asset('assets/css/template.css')!!}">
    <link rel="stylesheet" href="{!!asset('assets/css/services.css')!!}">
    <link rel="stylesheet" href="{!!asset('assets/css/style.css')!!}">
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
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Navegação Toggle">
            <i class="fa fa-bars"></i>
            <div class="menu-area">
                <ul>
                    @foreach ($networks as $network)
                    <li class="py-3"><a href="{!!$network->url!!}" target="_blank">{!!$network->icon!!}</i></a></li>
                    @endforeach
                </ul>
                <ul class="media2">
                    <li><a href="/"><i class="fas fa-home"></i>&nbsp;Home</a></li>
                    <li><a href="/blog"><i class="fas fa-blog"></i>&nbsp;Blog</a></li>
                    <li><a href="https://wa.me/5522992921877" target="_blank"><i class="fab fa-whatsapp"></i>&nbsp;WhatsApp</i></a></li>
                </ul> 
            </div>
        </button>
        <form method="get">
            <select style="width:90px; height:35px" onChange="this.form.submit()" name="lang" id="lang" class="form-control float-md-right">
                <option {{$lang == 'en' ?'selected="selected"':''}} value="en">En</option>
                <option {{$lang == 'pt-br' ?'selected="selected"':''}} value="pt-br">Pt-BR</option>
            </select>
        </form>
    </div>
{{-------------------------------- /MENU ---------------------------------}}
</nav>
{{-------------------------------- /NAVBAR ---------------------------------}}

{{-------------------------------- BANNER ---------------------------------}}
<div class="banner">
    <img src="{!!asset($images['banner'])!!}" alt="banner">
</div>
{{-------------------------------- /BANNER ---------------------------------}}

{{-------------------------------- SOBRE MIM ---------------------------------}}
<div class="about">
    <p>{!!$settings['about']!!}</p>
       <br>
       <a href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;{!!$settings['more']!!}</a>
       <hr>
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
                <div class="row carousel-item {{$new->item == 0 ?'active':''}} linkModal" data-toggle="modal" data-target="#myModal{{$new->item}}">
                    <div class="col-sm-6">
                        <div class="captions">
                            <div style="width: 400px !important;" class="captions-item">
                                <h1><strong>{{$new->title}}</strong></h1>
                                <p class="ml-3">{{$new->description}}</p><br>
                                <a style="font-size:14pt" href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;{!!$settings['more']!!}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{$new->image}}" width="500" class="img-fluid d-block float-right"alt="">   
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-------------------------------- /NOTICIAS HEADER ---------------------------------}}

{{-------------------------------- NOTICIAS MODAL -------------------------------}}
@foreach ($news as $new)
    <div class="modal " id="myModal{{$new->item}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <img style="margin-left:-12px" class="img-responsive img-rounded"src="{!!asset($new->image)!!}">                            
                    <button style="margin-left:-50px" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span class="dateBody"> {!!$new->date!!}</span>
                    <h2 class="blogTitle">{{$new->title}}</h2>
                    <h3 class="titleDesc py-3">{{$new->description}}</h3>
                    
                    <hr>                
                    <p class="py-4">{!!$new->content!!}</p>
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
{{-------------------------------- /NOTICIAS MODAL ---------------------------------}}

{{--------------------------------- SERVIÇOS ---------------------------------}}
<div class="container">
    <div class="grid-container">
        @foreach ($services as $service)
            <div style="background-color:{{$service->bgcolor}}; color:{{$service->textcolor}} " class="div{{$service->item}} item{{$service->item}} linkModal" data-toggle="modal" data-target="#myModal{{$service->item}}">
                    <h3>{{$service->title}}</h3>
                    <h4>{{$service->subtitle}}</h4>
            </div>
        @endforeach
    </div>
</div>
@foreach ($services as $service)
    <div class="modal fade" id="myModal{{$service->item}}">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button style="margin-left:-50px" type="button" class="close" data-dismiss="modal">&times;</button> 
                    <p class="py-4">{!!$service->content!!}</p>
                </div> 
            </div>
        </div>
    </div>
@endforeach 
{{-------------------------------- /SERVIÇOS ---------------------------------}}

{{--------------------------------- CLIENTES ---------------------------------}}
<section class="clients">
    <div class="container">
        <h2 class="subtitle">{!!$settings['clientTitle']!!}</h2>
        <ul>
            @foreach ($clients as $client)
            <li><img class="img-responsive" src="{!!asset($client->image)!!}" alt="{!!$client->name!!}" /></li>
            @endforeach
            <li><img class="img-responsive" src="assets/images/client/ocyan.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/equinor.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/baker.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/Halliburton.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/expro.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/petrorionew.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/Archer.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/metrorio.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/chevron.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/valaris.jpg" /></li>
            <li><img class="img-responsive" src="assets/images/client/teekay.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/modec.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/nov.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/petrobras.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/sbm.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/akofs.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/skf.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/starnav.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/bram.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/transocean.png" /></li>
            <li><img class="img-responsive" src="assets/images/client/weatherford.png" /></li>
        </ul>
    </div>
</section>
{{-------------------------------- /CLIENTES ---------------------------------}}

{{--------------------------------- FOOTER ---------------------------------}}
<footer>
{{------------------------------ FOOTER CONTATO ------------------------------}}
    <section class="contact">
        <div class="container">
        <img class="img-responsive float-right" style="max-height: 287px;"src="{!!asset($images['footer'])!!}" alt="footer">
            <div class="contact-box">
                <p class="subtitle">Atendimento</p>
                <a class="links" href="tel:{!!$settings['telefone']!!}"><div class="circle"><i class="phone"></i></div><span>{!!$settings['telefone']!!}</span></a>
                <a class="links" href="mailto:{!!$settings['email']!!}"><div class="circle"><i class="email"></i></div><span>{!!$settings['email']!!}</span></a>
                <a class="address-text" href="https://www.google.com.br/maps/place/R.+Jo%C3%A3o+do+Patroc%C3%ADnio,+83+-+Riviera+Fluminense,+Maca%C3%A9+-+RJ,+27937-190/@-22.3979063,-41.7941934,17z/data=!3m1!4b1!4m5!3m4!1s0x9630dd1e37a955:0xb0fbb62f9a02ec3d!8m2!3d-22.3979113!4d-41.7919994" target="_blank">
                    {!!$settings['address']!!} <br />
                    {!!$settings['district']!!}, {!!$settings['city']!!} – {!!$settings['state']!!}<br />
                    CEP: {!!$settings['zipcode']!!}
                </a>
            </div>
        </div>
    </section>
{{----------------------------- /FOOTER CONTATO ------------------------------}}

{{------------------------------- REDES SOCIAIS ------------------------------}}
    <div id="footer">
        <ul>
            @foreach ($networks as $network)
            <li class="py-3"><a href="{!!$network->url!!}" target="_blank">{!!$network->icon!!}</i></a></li>
            @endforeach
        </ul>
    </div>
{{------------------------------ /REDES SOCIAIS ------------------------------}}
</footer>
{{-------------------------------- /FOOTER ---------------------------------}}
<script type="text/javascript" src="{!!asset('assets/js/jquery.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/bootstrap.bundle.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/jquery.easing.min.js')!!}"></script>
<script type="text/script" src="{!!asset('assets/js/script.js')!!}"></script>    
</body>
</html>    

    