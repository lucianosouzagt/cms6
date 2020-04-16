@extends('site.layout')

@section('title','Pagina Home')

@section('content')
<div class="banner">
    <img src="assets/images/banner.png" alt="banner">
</div>
<div class="about">
    <p>A <strong>UNAX OFFSHORE</strong> é uma empresa de Engenharia de Lubrificação especializada no mercado Offshore.</br>
       Nossas soluções garantem a confiabilidade, disponibilidade e alta performance dos ativos de nossos clientes</p>
       <br>
       <a href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;Saiba Mais</a>
       <hr>
</div>
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
                                <a style="font-size:14pt" href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;Saiba Mais</a>
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
{{-- <div class="carousel-body">
    <div id="carouselSlide" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
            <li data-target="#carouselSlide" data-slide-to="0"class="active"></li>
            <li data-target="#carouselSlide" data-slide-to="1"></li>
            <li data-target="#carouselSlide" data-slide-to="2"></li>
            <li data-target="#carouselSlide" data-slide-to="3"></li>
            <li data-target="#carouselSlide" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="captions">
                    <div class="captions-item">
                        <h1>Problema no óleo lubrifucante? Pode ser Verniz!</h1>
                        <p>O Verniz é um contaminante macio e pequeno. Pensa-se que tenha apenas 0,01 micron de tamanho, aproximadamente. Como contaminante macio e insolúvel, não é claramente definivel ...</p>
                        <a href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;Saiba Mais</a>
                    </div>
                </div>
                <img src="assets/images/slide/BLOG 2.1.png" class="img-fluid d-block"alt="">   
            </div>
            <div class="carousel-item">
                <div class="captions">
                    <div class="captions-item">
                        <h1>Como evitar a formação de Verniz no óleo lubrificante?</h1>
                        <p>Como vimos no post Entendendo a formação de Verniz em maquinários (Parte 1), a principal causa de envelhecimento de um óleo lubrificante se define como um processo denominado ...</p>
                        <a href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;Saiba Mais</a>
                    </div>
                </div>
                <img src="assets/images/slide/BLOG.1.png" class="img-fluid d-block"alt="">
            </div>
            <div class="carousel-item">
                <div class="captions">
                    <div class="captions-item">
                        <h1>A solução para os problemas com Óleo Diesel</h1>
                        <p>O PROBLEMA Não importa a qualidade do diesel. A partir do momento que sai da refinaria e vai para os tanques, o combustível já começa a sofrer degradação, e ao adicionar o...</p>
                        <a href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;Saiba Mais</a>
                    </div>
                </div>            
                <img src="assets/images/slide/BLOG 1.1.png" class="img-fluid d-block"alt="">
            </div>
            <div class="carousel-item">
                <div class="captions">
                    <div class="captions-item">
                        <h1>Por que utilizar Lubrificantes Biodegradáveis?</h1>
                        <p>O investimento no biolubrificantes está alinhado à necessidade de substituir os ólesos minerais por lubrificantes rapidamente biodegradáveis e não tóxicos para os seres ...</p>
                        <a href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;Saiba Mais</a>
                    </div>
                </div>
                <img src="assets/images/slide/BLOG 3.1.png" class="img-fluid d-block"alt="">
            </div>
            <div class="carousel-item">
                <div class="captions">
                    <div class="captions-item">
                        <h1>Formação de espuma no óleo lubrificante: O que é isso?</h1>
                        <p>A formação de espuma é um problema relativamente comum em sistemas lubrificados a óleo. Por ser um tanto quanto difícil a solução do problema, é essencial a...</p>
                        <a href=""><i class="far fa-arrow-alt-circle-right"></i>&nbsp;Saiba Mais</a>
                    </div>
                </div>
                <img src="assets/images/slide/BLOG 4.1.png" class="img-fluid d-block"alt="">
            </div>
        </div>

        <!-- <a href="#carouselSlide" class="carousel-control-prev" rule="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a href="#carouselSlide" class="carousel-control-next" rule="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Próximo</span>
        </a> -->
    </div>
</div> --}}
{{--------------------------------- SERVIÇOS ---------------------------------}}
<div class="container">
    <div class="grid-container">
        @foreach ($services as $service)
            <div style="background-color:{{$service->bgcolor}}; color:{{$service->textcolor}} " class="div{{$service->item}} item{{$service->item}} linkModal" data-toggle="modal" data-target="#myModal{{$service->item}}">
                {{-- <div class="div{{$service->item}}" style="background-image: url({{$service->image}}); background-repeat: no-repeat;"> --}}
                    <h3>{{$service->title}}</h3>
                    <h4>{{$service->subtitle}}</h4>
                {{-- </div> --}}             
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

{{-- <section class="list-blocks">
    <div class="container">
        <div id="mosaic-blocks">
            <div class="grid-sizer"></div>
            <a class="block w-480 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#analiseDiesel')">
                <img class="inner-block" src="assets/images/servicos/analise/diesel-min.png" />
                <div class="caption black">
                    <p class="title">Análise de Diesel</p>
                    <p class="subtitle">Serviços - Análise</p>
                </div>
            </a>
            <a class="block w-480 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#analiseLub')">
                <img class="inner-block" src="assets/images/servicos/analise/lubrificantes-min.jpg" />
                <div class="caption">
                    <p class="title">Análise de <br />Lubrificantes</p>
                    <p class="subtitle">Serviços - Análise</p>

                </div>
            </a>
            <a class="block w-240 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#boroscopia')">
                <img class="inner-block" src="assets/images/servicos/analise/bororscopia-min.jpg" />
                <div class="caption">
                    <p class="title">Boroscopia</p>
                    <p class="subtitle">Serviços - Análise </p>
                </div>
            </a>
            <a class="block w-240 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#clinicaItinerante')">
                <img class="inner-block" src="assets/images/servicos/analise/clinica-min.jpg" />
                <div class="caption">
                    <p class="title">Clínica <br /> Itinerante</p>
                    <p class="subtitle"> Serviços - Análise</p>
                </div>
            </a>
            <a class="block w-480 h-480" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#mapeamento')">
                <img class="inner-block" src="assets/images/servicos/analise/mapeamento-min.jpg" />
                <div class="caption">
                    <p class="title">Mapeamento <br /> de Dados</p>
                    <p class="subtitle">Serviços - Análises</p>
                </div>
            </a>

            <a class="block w-480 h-480" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#graxa')">
                <img class="inner-block" src="assets/images/servicos/analise/graxa-min.jpg" />
                <div class="caption">
                    <p class="title">Análise de Graxa</p>
                    <p class="subtitle">Serviços - Análises</p>
                </div>
            </a>

            <a class="block w-240 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#lubCaboAco')">
                <img class="inner-block" src="assets/images/produtos/lubrificador-min.jpg" />
                <div class="caption center purple">
                    <p class="title"> Lubrificador <br />Automático <br />de Cabo-de-Aço</p>
                    <p class="subtitle">Equipamentos e Produtos</p>
                </div>
            </a>


            <a class="block w-480 h-480" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#tratamentoMotor')">
                <img class="inner-block" src="assets/images/servicos/descontaminacao/tratamento-min.jpg" />
                <div class="caption">
                    <p class="title"> Tratamento <br />multifuncional para <br />motores a Diesel A550</p>
                    <p class="subtitle">Serviços - Descontaminação</p>
                </div>
            </a>

            <a class="block w-240 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#limpezaTanques')">
                <img class="inner-block" src="assets/images/servicos/descontaminacao/limpeza-min.png" />
                <div class="caption black">
                    <p class="title">Tanques <br />de Diesel</p>
                    <p class="subtitle">Serviços - Descontaminação</p>
                </div>
            </a>



            <a class="block w-480 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#analiseFluidos')">
                <img class="inner-block" src="assets/images/servicos/analise/fluidos-min.jpg" />
                <div class="caption">
                    <p class="title">Análises<br /> de Fluído <br />Água-Glicol</p>
                    <p class="subtitle">Serviços - Análise</p>
                </div>

            </a>

            <a class="block w-240 h-240" style="background:#000" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#filtroDesumidificante')">
                <img class="inner-block" src="assets/images/produtos/filtro-min.jpg" />
                <div class="caption">
                    <p class="title">Filtros Desumidificantes</p>
                    <p class="subtitle">Equipamentos e Produtos</p>
                </div>
            </a>


            <a class="block w-480 h-240" style="background:#dcdcdc" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#minimess')">
                <img class="inner-block" style="max-width: 480px" src="assets/images/produtos/clare1.png" />
                <div class="caption">
                    <p class="title">Graxa Lubrificante <br /> para Válvula</p>
                    <p class="subtitle">Equipamentos e Produtos</p>
                </div>
            </a>


            <a class="block w-480 h-240" style="background:#a81c1f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#asf')">
                <img class="inner-block" style="max-width: 480px"src="assets/images/produtos/lanopro1.png" />
                <div class="caption">
                    <p class="title">
                        Lubrificantes <br /> Biodegradáveis
                    </p>
                    <p class="subtitle">Equipamentos e Produtos</p>
                </div>
            </a>

            <a class="block w-480 h-480" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#flushing')">
                <img class="inner-block" src="assets/images/servicos/descontaminacao/flushing-min.jpg" />
                <div class="caption">
                    <p class="title">Flushing e <br /> Decapagem Química</p>
                    <p class="subtitle">Serviços - Descontaminação</p>
                </div>
            </a>


            <a class="block w-240 h-240" style="background:#7f7f7f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#abastecedorOleo')">
                <img class="inner-block" src="assets/images/produtos/isolante.jpg" />
                <div class="caption purple">
                    <p class="title"> ANÁLISE DE ÓLEO ISOLANTE</p>
                    <p class="subtitle">SERVIÇOS - ANÁLISE</p>
                </div>
            </a>


            <a class="block w-480 h-240" style="background:#7f7f7f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#memolub')">
                <img class="inner-block" src="assets/images/produtos/memolub-min.jpg" />
                <div class="caption gray">
                    <p class="title">MEMOLUB</p>
                    <p class="subtitle">Equipamentos e Produtos</p>
                </div>
            </a>

            <a class="block w-240 h-240" style="background:#333333" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#eaton')">
                <img class="inner-block" src="assets/images/produtos/eaton-min.jpg" />
                <div class="caption gray">
                    <p class="title">Monitoramento <br />Online</p>
                    <p class="subtitle">Equipamentos e Produtos</p>
                </div>
            </a>


            <a class="block w-240 h-240" style="background:#b2b2b2" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#kats')">
                <img class="inner-block" src="assets/images/produtos/kats-min.jpg" />
                <div class="caption">
                    <p class="title">KATS Coating</p>
                    <p class="subtitle">Equipamentos e Produtos</p>
                </div>
            </a>

            <a class="block w-480 h-240" style="background:#000" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#whitmore')">
                <img class="inner-block" src="assets/images/produtos/whitemores-min.jpg" />
                <div class="caption">
                    <p class="title">WHITMORE’S<br />Lubrificantes<br /> de Alto Desempenho</p>
                    <p class="subtitle">Equipamentos e Produtos</p>
                </div>
            </a>
            <a class="block w-480 h-240" style="background:#333333" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#lubrificantesFluidos')">
                <img class="inner-block" src="assets/images/servicos/descontaminacao/fluidos-min.jpg" />
                <div class="caption">
                    <p class="title">Lubrificantes<br /> e Fluidos <br />Hidráulicos</p>
                    <p class="subtitle">Serviços - Descontaminação</p>
                </div>
            </a>
            <a class="block w-480 h-240" style="background:#b2b2b2" data-toggle="modal" data-target="#modalSaibaMais" onclick="showContentMais('#consultoria')">
                <img class="inner-block" src="assets/images/produtos/consultoria-min.jpg" />
                <div class="caption">
                    <p class="title">Consultoria<br /> da Concepção <br />à destinação</p>
                </div>
            </a>
            <a class="block w-240 h-240" style="background:#706863" data-toggle="modal" data-target="#modalSaibaMais" onclick="showContentMais('#treinamento')">
                <img class="inner-block" src="assets/images/produtos/treinamento-min.jpg" />
                <div class="caption black">
                    <p class="title" style="font-size:22px">Treinamento <br />na área<br /> de Engenharia<br /> de Lubrificação</p>
                </div>
            </a>
            <a class="block w-240 h-240" style="background:#7f7f7f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#descontaminacaoSolidaLiquida')">
                <img class="inner-block" src="assets/images/servicos/residuos/descontaminacao-min.png" />
                <div class="caption purple">
                    <p class="title" style="font-size: 22px;">Descontaminação Sólida e Líquida</p>
                    <p class="subtitle">Serviços - Análise</p>
                </div>
            </a>
            <a class="block w-240 h-240" style="background:#7f7f7f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#projeto')">
                <img class="inner-block" src="assets/images/produtos/projeto-min.jpg" />
                <div class="caption white">
                    <p class="title" style="font-size: 22px;">Desenvolvimento <br /> de Projetos</p>
                </div>
            </a>
        </div>
    </div>
</section> --}}

<section class="clients">
        <div class="container">
            <h2 class="subtitle">Nossos Clientes</h2>


            <ul>
                <!--<li><img class="img-responsive" src="/templates/unaxsite/site/images/clients/aker.png" /></li>-->
                <li><img class="img-responsive" src="assets/images/client/ocyan.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/equinor.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/baker.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/Halliburton.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/expro.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/petrorionew.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/Archer.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/metrorio.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/chevron.png" /></li>
                <!--<li><img class="img-responsive" src="assets/images/client/dof.png" /></li>-->
                <!--<li><img class="img-responsive" src="assets/images/client/ensco.png" /></li>-->
                <li><img class="img-responsive" src="assets/images/client/valaris.jpg" /></li>
                <li><img class="img-responsive" src="assets/images/client/teekay.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/modec.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/nov.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/petrobras.png" /></li>
                <!--<li><img class="img-responsive" src="assets/images/client/queiroz.png" /></li>-->
                <li><img class="img-responsive" src="assets/images/client/sbm.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/akofs.png" /></li>
                <!--<li><img class="img-responsive" src="assets/images/client/seaflux.png" /></li>-->
                <li><img class="img-responsive" src="assets/images/client/skf.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/starnav.png" /></li>
                <!--<li><img class="img-responsive" src="assets/images/client/odebrecht.png" /></li>-->
                <!--<li><img class="img-responsive" src="assets/images/client/man.png" /></li>-->
                <li><img class="img-responsive" src="assets/images/client/bram.png" /></li>
                <li><img class="img-responsive" src="assets/images/client/transocean.png" /></li>
                <!--<li><img class="img-responsive" src="assets/images/client/ute.png" /></li>-->
                <!--<li><img class="img-responsive" src="assets/images/client/ventura.png" /></li>-->
                <li><img class="img-responsive" src="assets/images/client/weatherford.png" /></li>
                <!--<li><img class="img-responsive" src="assets/images/client/techocean.png" /></li>-->
            </ul>
        </div>
    </section>
<footer>
{{-- <section class="contact">
    <div class="container">
    <img src="assets/images/contato.png" alt="footer">
        <address class="contact-box">
            <p class="subtitle">Atendimento</p>
            <a class="links" href="tel:+55 (22) 2773-5096"><div class="circle"><i class="phone"></i></div><span>+55 (22) 2773-5096</span></a>
            <a class="links" href="mailto:comercial&#64;unax.com.br"><div class="circle"><i class="email"></i></div><span>comercial&#64;unax.com.br</span></a>
            <a class="address-text" href="https://www.google.com.br/maps/place/R.+Jo%C3%A3o+do+Patroc%C3%ADnio,+83+-+Riviera+Fluminense,+Maca%C3%A9+-+RJ,+27937-190/@-22.3979063,-41.7941934,17z/data=!3m1!4b1!4m5!3m4!1s0x9630dd1e37a955:0xb0fbb62f9a02ec3d!8m2!3d-22.3979113!4d-41.7919994" target="_blank">
                R. João do Patrocínio, 83, <br />
                Riviera Fluminense, Macaé – RJ<br />
                CEP: 27.937-200
            </a>
        </address>
    </div>
</section> --}}
    <!-- <div class="contato">
        <span>ATENDIMENTO</span><br>
        <a href="tel:+55 (22) 2773-5096"><i class="fa fa-phone-square fa-flip-horizontal"></i>&nbsp;&nbsp;+55 (22) 2773-5096</a><br>
        <a href="mailto:comercial@unax.com.br"><i class="fas fa-envelope-square"></i>&nbsp;&nbsp;comercial@unax.com.br</a>
    </div>
    <div id="footer">
        <ul>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
    </div> -->

    
</footer>

    
@endsection
    