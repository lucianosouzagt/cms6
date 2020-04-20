<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    
        .list-blocks {
          padding: 0 0 105px;
          width: 100%;
          background: #fff;
        }
        .list-blocks .container {
          max-width: 1200px;
          padding: 0;
        }
        .list-blocks #mosaic-blocks {
          margin: 0;
        }
        .list-blocks .grid-sizer {
          width: 20%;
        }
        .list-blocks .black-overlay {
          display: block;
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          background: rgba(0, 0, 0, 0.1);
        }
        .list-blocks .inner-block {
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          height: 100%;
          -moz-transition: all 0.6s ease-in-out;
          -o-transition: all 0.6s ease-in-out;
          -webkit-transition: all 0.6s ease-in-out;
          transition: all 0.6s ease-in-out;
        }
        .list-blocks .block {
          overflow: hidden;
          margin: auto;
          float: left;
          margin: 0;
          display: block;
          background-size: cover !important;
          background-repeat: no-repeat !important;
          background-position: center !important;
          position: relative;
          cursor: default;
        }
        .list-blocks .block:hover .inner-block {
          -moz-transform: scale(1.125);
          -ms-transform: scale(1.125);
          -o-transform: scale(1.125);
          -webkit-transform: scale(1.125);
          transform: scale(1.125);
        }
        .list-blocks .w-240 {
          width: 20%;
        }
        .list-blocks .w-480 {
          width: 40%;
        }
        .list-blocks .h-240 {
          height: 240px;
        }
        .list-blocks .h-480 {
          height: 480px;
        }
        .list-blocks .caption {
          padding: 25px;
          position: absolute;
          width: auto;
          display: inline-block;
          left: 0;
          top: 0;
          z-index: 1;
        }
        .list-blocks .caption p {
          color: #fff;
          text-align: left;
        }
        .list-blocks .caption p.title {
          font-size: 2.6em;
          line-height: 28px;
          text-transform: uppercase;
          font-family: 'Roboto Condensed', sans-serif;
          font-family: "Roboto Condensed";
          font-weight: 400;
        }
        .list-blocks .caption p.subtitle {
          font-size: 1.6em;
          line-height: 18px;
          font-family: 'Roboto Condensed', sans-serif;
          font-family: "Roboto Condensed";
          font-weight: 400;
          font-weight: 300;
        }
        .list-blocks .caption.bottom {
          top: auto;
          bottom: 0;
        }
        .list-blocks .caption.center {
          right: 0;
          margin: auto;
        }
        .list-blocks .caption.center p {
          text-align: center;
        }
        .list-blocks .caption.black p {
          color: #1c1c1c;
        }
        .list-blocks .caption.black p.subtitle {
          color: #1c1c1c;
        }
        .list-blocks .caption.gray p {
          color: #414349;
        }
        .list-blocks .caption.gray p.subtitle {
          color: #414349;
        }
        .list-blocks .caption.purple p {
          color: #313238;
        }
        .list-blocks .caption.purple p.subtitle {
          color: #313238;
        }
        </style>
</head>
<body>
    <section class="list-blocks">
        <div class="container">
            <div id="mosaic-blocks">
    
                <a class="block w-480 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#analiseDiesel')">
                    <img src="{!!asset('/assets/images/servicos/analise/diesel-min.png')!!}" />
                    <div class="caption black">
                        <p class="title">Análise de Diesel</p>
                        <p class="subtitle">Serviços - Análise</p>
                    </div>
                </a>
                <a class="block w-480 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#analiseLub')">
                    <img src="{!!asset('/assets/images/servicos/analise/lubrificantes-')!!}min.jpg" />
                    <div class="caption">
                        <p class="title">Análise de <br />Lubrificantes</p>
                        <p class="subtitle">Serviços - Análise</p>
    
                    </div>
                </a>
                <a class="block w-240 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#boroscopia')">
                    <img src="{!!asset('/assets/images/servicos/analise/bororscopia-mi')!!}n.jpg" />
                    <div class="caption">
                        <p class="title">Boroscopia</p>
                        <p class="subtitle">Serviços - Análise </p>
                    </div>
                </a>
                <a class="block w-240 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#clinicaItinerante')">
                    <img src="{!!asset('/assets/images/servicos/analise/clinica-min.jp')!!}g" />
                    <div class="caption">
                        <p class="title">Clínica <br /> Itinerante</p>
                        <p class="subtitle"> Serviços - Análise</p>
                    </div>
                </a>
                <a class="block w-480 h-480" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#mapeamento')">
                    <img src="{!!asset('/assets/images/servicos/analise/mapeamento-min')!!}.jpg" />
                    <div class="caption">
                        <p class="title">Mapeamento <br /> de Dados</p>
                        <p class="subtitle">Serviços - Análises</p>
                    </div>
                </a>
                <a class="block w-480 h-480" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#graxa')">
                    <img src="{!!asset('/assets/images/servicos/analise/graxa-min.jpg"')!!} />
                    <div class="caption">
                        <p class="title">Análise de Graxa</p>
                        <p class="subtitle">Serviços - Análises</p>
                    </div>
                </a>
                <a class="block w-240 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#lubCaboAco')">
                    <img src="{!!asset('/produtos/lubrificador-min.jpg" ')!!}/>
                    <div class="caption center purple">
                        <p class="title"> Lubrificador <br />Automático <br />de Cabo-de-Aço</p>
                        <p class="subtitle">Equipamentos e Produtos</p>
                    </div>
                </a>
                <a class="block w-480 h-480" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#tratamentoMotor')">
                    <img src="{!!asset('/assets/images/servicos/descontaminacao/tratam')!!}ento-min.jpg" />
                    <div class="caption">
                        <p class="title"> Tratamento <br />multifuncional para <br />motores a Diesel A550</p>
                        <p class="subtitle">Serviços - Descontaminação</p>
                    </div>
                </a>
                <a class="block w-240 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#limpezaTanques')">
                    <img src="{!!asset('/assets/images/servicos/descontaminacao/limpez')!!}a-min.png" />
                    <div class="caption black">
                        <p class="title">Tanques <br />de Diesel</p>
                        <p class="subtitle">Serviços - Descontaminação</p>
                    </div>
                </a>
                <a class="block w-480 h-240" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#analiseFluidos')">
                    <img src="{!!asset('/assets/images/servicos/analise/fluidos-min.jp')!!}g" />
                    <div class="caption">
                        <p class="title">Análises<br /> de Fluído <br />Água-Glicol</p>
                        <p class="subtitle">Serviços - Análise</p>
                    </div>
    
                </a>
                <a class="block w-240 h-240" style="background:#000" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#filtroDesumidificante')">
                    <img src="{!!asset('/produtos/filtro-min.jpg" />
   ')!!}                 <div class="caption">
                        <p class="title">Filtros Desumidificantes</p>
                        <p class="subtitle">Equipamentos e Produtos</p>
                    </div>
                </a>
                <a class="block w-480 h-240" style="background:#dcdcdc" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#minimess')">
                    <img src="{!!asset('/produtos/clare1.png" />
       ')!!}             <div class="caption">
                        <p class="title">Graxa Lubrificante <br /> para Válvula</p>
                        <p class="subtitle">Equipamentos e Produtos</p>
                    </div>
                </a>
                <a class="block w-480 h-240" style="background:#a81c1f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#asf')">
                    <img src="{!!asset('/produtos/lanopro1.png" />
     ')!!}               <div class="caption">
                        <p class="title">
                            Lubrificantes <br /> Biodegradáveis
                        </p>
                        <p class="subtitle">Equipamentos e Produtos</p>
                    </div>
                </a>
                <a class="block w-480 h-480" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#flushing')">
                    <img src="{!!asset('/assets/images/servicos/descontaminacao/flushi')!!}ng-min.jpg" />
                    <div class="caption">
                        <p class="title">Flushing e <br /> Decapagem Química</p>
                        <p class="subtitle">Serviços - Descontaminação</p>
                    </div>
                </a>
                <a class="block w-240 h-240" style="background:#7f7f7f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#abastecedorOleo')">
                    <img src="{!!asset('/produtos/isolante.jpg" />
     ')!!}               <div class="caption purple">
                        <p class="title"> ANÁLISE DE ÓLEO ISOLANTE</p>
                        <p class="subtitle">SERVIÇOS - ANÁLISE</p>
                    </div>
                </a>
                <a class="block w-480 h-240" style="background:#7f7f7f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#memolub')">
                    <img src="{!!asset('/produtos/memolub-min.jpg" />
  ')!!}                  <div class="caption gray">
                        <p class="title">MEMOLUB</p>
                        <p class="subtitle">Equipamentos e Produtos</p>
                    </div>
                </a>
                <a class="block w-240 h-240" style="background:#333333" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#eaton')">
                    <img src="{!!asset('/produtos/eaton-min.jpg" />
    ')!!}                <div class="caption gray">
                        <p class="title">Monitoramento <br />Online</p>
                        <p class="subtitle">Equipamentos e Produtos</p>
                    </div>
                </a>
                <a class="block w-240 h-240" style="background:#b2b2b2" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#kats')">
                    <img src="{!!asset('/produtos/kats-min.jpg" />
     ')!!}               <div class="caption">
                        <p class="title">KATS Coating</p>
                        <p class="subtitle">Equipamentos e Produtos</p>
                    </div>
                </a>
                <a class="block w-480 h-240" style="background:#000" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#whitmore')">
                    <img src="{!!asset('/produtos/whitemores-min.jpg" />')!!}
                    <div class="caption">
                        <p class="title">WHITMORE’S<br />Lubrificantes<br /> de Alto Desempenho</p>
                        <p class="subtitle">Equipamentos e Produtos</p>
                    </div>
                </a>
                <a class="block w-480 h-240" style="background:#333333" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#lubrificantesFluidos')">
                    <img src="{!!asset('/assets/images/servicos/descontaminacao/fluido')!!}s-min.jpg" />
                    <div class="caption">
                        <p class="title">Lubrificantes<br /> e Fluidos <br />Hidráulicos</p>
                        <p class="subtitle">Serviços - Descontaminação</p>
                    </div>
                </a>
                <a class="block w-480 h-240" style="background:#b2b2b2" data-toggle="modal" data-target="#modalSaibaMais" onclick="showContentMais('#consultoria')">
                    <img src="{!!asset('/consultoria-min.jpg" />
       ')!!}             <div class="caption">
                        <p class="title">Consultoria<br /> da Concepção <br />à destinação</p>
                    </div>
                </a>
                <a class="block w-240 h-240" style="background:#706863" data-toggle="modal" data-target="#modalSaibaMais" onclick="showContentMais('#treinamento')">
                    <img src="{!!asset('/treinamento-min.jpg" />
       ')!!}             <div class="caption black">
                        <p class="title" style="font-size:22px">Treinamento <br />na área<br /> de Engenharia<br /> de Lubrificação</p>
                    </div>
                </a>
                <a class="block w-240 h-240" style="background:#7f7f7f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#descontaminacaoSolidaLiquida')">
                    <img src="{!!asset('/assets/images/servicos/residuos/descontaminac')!!}ao-min.png" />
                    <div class="caption purple">
                        <p class="title" style="font-size: 22px;">Descontaminação Sólida e Líquida</p>
                        <p class="subtitle">Serviços - Análise</p>
                    </div>
                </a>
                <a class="block w-240 h-240" style="background:#7f7f7f" data-toggle="modal" data-target="#modalDetalhes" onclick="showContent('#projeto')">
                    <img src="{!!asset('/projeto-min.jpg" />
           ')!!}         <div class="caption white">
                        <p class="title" style="font-size: 22px;">Desenvolvimento <br /> de Projetos</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
</body>
</html>