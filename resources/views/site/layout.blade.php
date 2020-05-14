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
    <title>@yield('title')</title>
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
                    <option {{$lang == 'en' ?'selected="selected"':''}} value="en">En<img src="{{url('/storage/site/en-usa.png')}}" alt="en"></option>
                    <option {{$lang == 'pt-br' ?'selected="selected"':''}} value="pt-br">Pt-BR<img src="{{url('/storage/site/pt-br.png')}}" alt="pt-br"></option>
                </select>
            </form>
        </div>
    {{-------------------------------- /MENU ---------------------------------}}
    </nav>

@yield('content')

<script type="text/javascript" src="{!!asset('assets/js/jquery.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/bootstrap.bundle.min.js')!!}"></script>
<script type="text/javascript" src="{!!asset('assets/js/jquery.easing.min.js')!!}"></script>
<script type="text/script" src="{!!asset('assets/js/script.js')!!}"></script>    
</body>
</html>