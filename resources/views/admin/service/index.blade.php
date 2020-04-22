@extends('adminlte::page')

@section('title','Serviços')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
<link rel="stylesheet" href="{!!asset('assets/css/service-preview.css')!!}">
    
@endsection


@section('content_header')
        <div class="row">
            <div class="col-md-8">
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
            <div class="col-sm-2">
                <a href="{{route('service.create')}}" class="btn btn-primary"style="position: block; float:right; margin-bottom:10px;">Adicionar serviço</a>
            </div>
        </div>
@endsection



@section('content')

<ul class="nav nav-tabs col-12" id="custom-content-above-tab" role="tablist">    
    <li class="nav-item">
        <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Serviços</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Ordenação</a>
    </li>
</ul>

<div class="tab-content" id="custom-content-above-tabContent">
    <div class="mt-3 tab-pane fade active show" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="50">ID</th>
                            <th>Título</th>
                            <th>Ordenação</th>
                            <th width="100">Idioma</th>
                            <th width="100">Ações</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{$service->ordination}}</td>
                            <td>{{$service->lang}}</td>
                            <td style="text-align:center">
                                @if($service->status == 1)
                                <a style="outline: none;text-decoration: none;color: #777777;" href="{{route('service.done',['id'=>$service->id])}}"><i class="far fa-eye"></i></a>
                                @else
                                <a style="outline: none;text-decoration: none;color: #666666;" href="{{route('service.done',['id'=>$service->id])}}"><i class="far fa-eye-slash"></i></a> 
                                @endif
                            <a style="outline: none;text-decoration: none;color: #5555ff;" href="{{route('service.edit',['service'=>$service->id])}}"><i class="fas fa-edit"></i></a>  
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
    </div>


<div class="mt-3 tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
    <div class="card">
        <div class="card-body row">
            <div class="container col-sm-5">
                <div class="grid-container">
                    @foreach ($servicesPreview as $servicePreview)
                        @if ($servicePreview->ordination <= 24)
                            <div style="background-color:{{$servicePreview->bgcolor}}; color:{{$servicePreview->textcolor}};" class="zoom div{{$servicePreview->item}} item{{$servicePreview->item}} linkModal" data-toggle="modal" data-target="#myModalServicePreview1">
                                <img style="" class="img-responsive" src="{!!asset($servicePreview->imageHeader)!!}" alt="">~
                                <h3 class="text-item">{{$servicePreview->ordination}}{{--  <br>
                                    <span>{{$servicePreview->title}}</span>  --}}</h3>                               
                            </div>          
                        @endif
                        
                    @endforeach                    
                </div>
            </div>
            <div class="col-sm-7 listPreview">
                <div class="form-group row" style="padding:0; margin:0">
                @foreach ($servicesList as $serviceList)                
                    <label class=" col-sm-4 col-form-label list" for="ordination">{{$serviceList->title}}</label>
                    <div class="col-sm-2"> 
                        <form method="get"> 
                            <input type="hidden" name="id" value="{{$serviceList->id}}">                          
                            <select style="width:50px;height:25px; padding:2px; font-size:10pt;"onChange="this.form.submit()" name="ordination" id="ordination" class="form-control">
                                <option {{$serviceList->ordination > 24 ?'selected="selected"':''}} value= 9999 >0</option>
                                <option {{$serviceList->ordination == 1 ?'selected="selected"':''}} value= 1 >1</option>
                                <option {{$serviceList->ordination == 2 ?'selected="selected"':''}} value= 2 >2</option>
                                <option {{$serviceList->ordination == 3 ?'selected="selected"':''}} value= 3 >3</option>
                                <option {{$serviceList->ordination == 4 ?'selected="selected"':''}} value= 4 >4</option>
                                <option {{$serviceList->ordination == 5 ?'selected="selected"':''}} value= 5 >5</option>
                                <option {{$serviceList->ordination == 6 ?'selected="selected"':''}} value= 6 >6</option>
                                <option {{$serviceList->ordination == 7 ?'selected="selected"':''}} value= 7 >7</option>
                                <option {{$serviceList->ordination == 8 ?'selected="selected"':''}} value= 8 >8</option>
                                <option {{$serviceList->ordination == 9 ?'selected="selected"':''}} value= 9 >9</option>
                                <option {{$serviceList->ordination == 10 ?'selected="selected"':''}} value= 10 >10</option>
                                <option {{$serviceList->ordination == 11 ?'selected="selected"':''}} value= 11 >11</option>
                                <option {{$serviceList->ordination == 12 ?'selected="selected"':''}} value= 12 >12</option>
                                <option {{$serviceList->ordination == 13 ?'selected="selected"':''}} value= 13 >13</option>
                                <option {{$serviceList->ordination == 14 ?'selected="selected"':''}} value= 14 >14</option>
                                <option {{$serviceList->ordination == 15 ?'selected="selected"':''}} value= 15 >15</option>
                                <option {{$serviceList->ordination == 16 ?'selected="selected"':''}} value= 16 >16</option>
                                <option {{$serviceList->ordination == 17 ?'selected="selected"':''}} value= 17 >17</option>
                                <option {{$serviceList->ordination == 18 ?'selected="selected"':''}} value= 18 >18</option>
                                <option {{$serviceList->ordination == 19 ?'selected="selected"':''}} value= 19 >19</option>
                                <option {{$serviceList->ordination == 20 ?'selected="selected"':''}} value= 20 >20</option>
                                <option {{$serviceList->ordination == 21 ?'selected="selected"':''}} value= 21 >21</option>
                                <option {{$serviceList->ordination == 22 ?'selected="selected"':''}} value= 22 >22</option>
                                <option {{$serviceList->ordination == 23 ?'selected="selected"':''}} value= 23 >23</option>
                                <option {{$serviceList->ordination == 24 ?'selected="selected"':''}} value= 24 >24</option>
                            </select>
                        </form>
                    </div> 
                                 
                @endforeach
            </div>  
        </div>
    </div>
</div>


@endsection