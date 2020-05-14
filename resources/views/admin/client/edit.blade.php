@extends('adminlte::page')

@section('title','Clientes')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection

@section('content')
    <style>
        .tox-notifications-container{ display: none !important; }
        .uploadImage{
            display: block; width: 100%;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            box-shadow: inset 0 0 0 transparent;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>

    @if($errors->any())
        <div class="row">
            <div class="mr-5 col-sm-8 alert alert-danger alert-dismissible">
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
    <div class="card">
        <div class="card-body">
            <div class="card-header row">
                <h3>Cliente - Editar</h3>
            </div>
            <form action="{{route('client.update',['client'=>$client->id])}}" method="POST"class="mt-3 form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label class="ml-5 col-sm-2 col-form-label" for="status">Status</label>
                    <div class="col-sm-2">                            
                        <select style="width:100px" name="status" id="status" class="form-control">
                            <option {{$client->status == 1 ?'selected="selected"':''}} value= 1 >Ativo</option>
                            <option {{$client->status == 0 ?'selected="selected"':''}} value= 0 >Inativo</option>
                        </select>
                    </div> 
                    <label class="ml-5 col-sm-2 col-form-label" for="ordination">Ordenação</label>
                    <div class="col-sm-2">                            
                        <select style="width:110px" name="ordination" id="ordination" class="form-control">
                            <option {{$client->ordination == null ?'selected="selected"':''}} value= 99999 >0</option>
                            <option {{$client->ordination == 1 ?'selected="selected"':''}} value= 1 >1</option>
                            <option {{$client->ordination == 2 ?'selected="selected"':''}} value= 2 >2</option>
                            <option {{$client->ordination == 3 ?'selected="selected"':''}} value= 3 >3</option>
                            <option {{$client->ordination == 4 ?'selected="selected"':''}} value= 4 >4</option>
                            <option {{$client->ordination == 5 ?'selected="selected"':''}} value= 5 >5</option>
                            <option {{$client->ordination == 6 ?'selected="selected"':''}} value= 6 >6</option>
                            <option {{$client->ordination == 7 ?'selected="selected"':''}} value= 7 >7</option>
                            <option {{$client->ordination == 8 ?'selected="selected"':''}} value= 8 >8</option>
                            <option {{$client->ordination == 9 ?'selected="selected"':''}} value= 9 >9</option>
                            <option {{$client->ordination == 10 ?'selected="selected"':''}} value= 10 >10</option>
                            <option {{$client->ordination == 11 ?'selected="selected"':''}} value= 11 >11</option>
                            <option {{$client->ordination == 12 ?'selected="selected"':''}} value= 12 >12</option>
                            <option {{$client->ordination == 13 ?'selected="selected"':''}} value= 13 >13</option>
                            <option {{$client->ordination == 14 ?'selected="selected"':''}} value= 14 >14</option>
                            <option {{$client->ordination == 15 ?'selected="selected"':''}} value= 15 >15</option>
                            <option {{$client->ordination == 16 ?'selected="selected"':''}} value= 16 >16</option>
                            <option {{$client->ordination == 17 ?'selected="selected"':''}} value= 17 >17</option>
                            <option {{$client->ordination == 18 ?'selected="selected"':''}} value= 18 >18</option>
                            <option {{$client->ordination == 19 ?'selected="selected"':''}} value= 19 >19</option>
                            <option {{$client->ordination == 20 ?'selected="selected"':''}} value= 20 >20</option>
                            <option {{$client->ordination == 21 ?'selected="selected"':''}} value= 21 >21</option>
                        </select>
                    </div> 
                </div>
                <div class="form-group row">
                    <label for="name" class="ml-5 col-sm-2 col-form-label">Cliente</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$client->name}}" placeholder="Digite o nome do Cliente">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="ml-5 col-sm-2 col-form-label" data-toggle="tooltip" data-placement="top" title="Insira imagens com fundo transparente ou branco, no formato png ou jpg!" for="image">Imagem</label>
                    <div class="col-sm-6">
                        <input type="file" class="uploadImage form-control-file" name="image" id="image">
                        <span style="font-size:10px;">
                            Altura de 150px a 30px | Largura de 300px a 75px | Formato png e jpg com fundo trasnparente ou branco!
                        </span>
                    </div>
                </div>
                <button type="submit" class="ml-5 mt-2 btn btn-success">Salvar</button>
                <a href="{{route('client.index')}}" class="btn btn-default float-right">Cancelar</a>
            </form>
        </div>
    </div>
@endsection