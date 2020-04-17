
@extends('adminlte::page')

@section('title', 'Configurações')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection

@section('content_header')
    <div class="col-md-6">
        <h1>Configurações do Site</h1>
    </div>
    <div class="col-md-6 float-right">
        <form method="get">
            <select style="width:90px; height:35px" onChange="this.form.submit()" name="lang" id="lang" class="form-control float-md-right">
                <option {{$lang == 'en' ?'selected="selected"':''}} value="en">En</option>
                <option {{$lang == 'pt-br' ?'selected="selected"':''}} value="pt-br">Pt-BR</option>
            </select>
        </form>
    </div>
@endsection


@section('content')

<ul class="nav nav-tabs col-12" id="custom-content-above-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Informações Gerais</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Imagens</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill" href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Rede Social</a>
    </li>    
</ul>

<div class="tab-content" id="custom-content-above-tabContent">
    <div class="mt-3 tab-pane fade active show" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
       <div class="card">
        <div class="card-body">
            @if($errors->any())
                <div class="row">
                    <div class="ml-5 col-sm-8 alert alert-danger alert-dismissible">
                        <ul>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>  
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>   
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <h3>Informações Gerais</h3>
            <hr>
            <form action="{{route('settings.save')}}" method="POST"class="mt-3 form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="title" class="ml-5 col-sm-2 col-form-label">Titulo Setor Cliente</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" id="titel" value="{{$settings['clientTitle']}}" placeholder="Exemplo: Titulo do Site">
                    </div>
                </div>
                <div class="form-group row">       
                    <label for="about" class="ml-5 col-sm-2 col-form-label">Sobre a Empresa</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="about" id="about" value="{{$settings['about']}}">
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="email" class="ml-5 col-sm-2 col-form-label">Email de Contato</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" id="email" value="{{$settings['email']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telefone" class="ml-5 col-sm-2 col-form-label">Telefone de Contato</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"name="telefone" id="telefone" value="{{$settings['telefone']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="ml-5 col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" id="address" value="{{$settings['address']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="district" class="ml-5 col-sm-2 col-form-label">Bairro</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"name="district" id="district" value="{{$settings['district']}}">
                    </div>
                    <label for="zipcode" class=" col-sm-1 col-form-label">CEP</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="zipcode" id="zipcode" value="{{$settings['zipcode']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="ml-5 col-sm-2 col-form-label">Cidade</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="city" id="city" value="{{$settings['city']}}">
                    </div>
                    <label for="state" class=" col-sm-2 col-form-label">Estado</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control"name="state" id="state" value="{{$settings['state']}}">
                    </div>
                </div>      
                <button type="submit" class="ml-5 mt-4 btn btn-success">Salvar</button>
                <a href="{{route('settings')}}" class="btn btn-default float-right">Cancelar</a>
            </form>
        </div>
    </div>

    </div>
    <div class="mt-3 tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
        <div class="card">
            <div class="card-body">
                @if($errors->any())
                    <div class="row">
                        <div class="ml-5 col-sm-8 alert alert-danger alert-dismissible">
                            <ul>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>  
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>   
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <h3>Imagens</h3>
                <hr>
                <form action="{{route('settings.save')}}" method="POST"class="mt-3 form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group row">
                        <label class="ml-5 col-sm-2 col-form-label" for="logo">Logo</label>
                        <div class="col-sm-6">
                            <input type="file" class="uploadImage form-control-file" name="logo" id="logo">
                        </div>
                        <div class="col-sm-3">
                            <img style="max-width:100px; max-height:100px" class="img-responsive "style=""src="{!!asset($images['logo'])!!}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="ml-5 col-sm-2 col-form-label" for="banner">Banner</label>
                        <div class="col-sm-6">
                            <input type="file" class="uploadImage form-control-file" name="banner" id="banner">
                        </div>
                        <div class="col-sm-3">
                            <img style="max-width:100px; max-height:100px" class="img-responsive "style=""src="{!!asset($images['banner'])!!}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="ml-5 col-sm-2 col-form-label" for="bannerMobile">Banner Mobile</label>
                        <div class="col-sm-6">
                            <input type="file" class="uploadImage form-control-file" name="bannerMobile" id="bannerMobile">
                        </div>
                        <div class="col-sm-3">
                            <img style="max-width:100px; max-height:100px" class="img-responsive "style=""src="{!!asset($images['bannerMobile'])!!}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="ml-5 col-sm-2 col-form-label" for="footer">Rodapé</label>
                        <div class="col-sm-6">
                            <input type="file" class="uploadImage form-control-file" name="footer" id="footer">
                        </div>
                        <div class="col-sm-3">
                            <img style="max-width:100px; max-height:100px" class="img-responsive "style=""src="{!!asset($images['footer'])!!}">
                        </div>
                    </div>
                    <button type="submit" class="ml-5 mt-4 btn btn-success">Salvar</button>
                    <a href="{{route('settings')}}" class="btn btn-default float-right">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-3 tab-pane fade" id="custom-content-above-messages" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
        <div class="card">
            <div class="card-body">
                @if($errors->any())
                    <div class="row">
                        <div class="ml-5 col-sm-8 alert alert-danger alert-dismissible">
                            <ul>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>  
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>   
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <h3>Rede Social</h3>
                <hr>
                <form action="{{route('settings.save')}}" method="POST"class="mt-3 form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="facebook" class="ml-5 col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="facebook" id="titel" value="{{$networks['facebook']}}">
                        </div>
                    </div>
                    <div class="form-group row">       
                        <label for="instagram" class="ml-5 col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="instagram" id="instagram" value="{{$networks['instagram']}}">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="linkedin" class="ml-5 col-sm-2 col-form-label">Linkedin</label>
                        <div class="col-sm-6">
                            <input type="linkedin" class="form-control" name="linkedin" id="linkedin" value="{{$networks['linkedin']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="googleplus" class="ml-5 col-sm-2 col-form-label">Google Plus</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control"name="googleplus" id="googleplus" value="{{$networks['googleplus']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pinterest" class="ml-5 col-sm-2 col-form-label">Pinterest</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="pinterest" id="pinterest" value="{{$networks['pinterest']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="whatsapp" class="ml-5 col-sm-2 col-form-label">WhatsApp</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{$networks['whatsapp']}}">
                        </div>
                    </div>
                          
                    <button type="submit" class="ml-5 mt-4 btn btn-success">Salvar</button>
                    <a href="{{route('settings')}}" class="btn btn-default float-right">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
  </div>

@endsection