@extends('adminlte::page')

@section('title','Cadastrar Serviços')

@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection



{{-- @section('content_header')
        <h1>Cadastro de Usuário</h1>
@endsection --}}



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
        <div class="card-header row">
            <div class="col-sm-6">
                <h3>Cadastro de Serviço</h3>
            </div>
            <div class="col-sm-6">
                <form method="get">
                    
                </form>
            </div>
            
        </div>
        <div class="card-body">
            <form action="{{route('service.update', ['service'=>$service->id])}}" method="POST"class="mt-3 form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="ml-4 col-sm-2 col-form-label" for="lang">Selecione o idioma </label>
                    <div class="col-sm-2">
                        <select style="width:160px" name="lang" id="lang" class="form-control">
                            <option {{$service->lang == 'en' ?'selected="selected"':''}} value="en">English USA</option>
                            <option {{$service->lang == 'pt-br' ?'selected="selected"':''}} value="pt-br">Português Brasil</option>
                        </select>
                    </div>
                    <label class="ml-4 col-sm-1 col-form-label" for="status">Status</label>
                    <div class="col-sm-1">                            
                        <select style="width:100px" name="status" id="status" class="form-control">
                            <option {{$service->status == 1 ?'selected="selected"':''}}value= 1 >Ativo</option>
                            <option {{$service->status == 0 ?'selected="selected"':''}}value= 0 >Inativo</option>
                        </select>
                    </div>
                    <label class="ml-5 col-sm-2 col-form-label" for="ordination">Ordenação</label>
                    <div class="col-sm-2">                            
                        <select style="width:85px" name="ordination" id="ordination" class="form-control">
                            <option {{$service->ordination == 9999 ?'selected="selected"':''}} value= 9999 >0</option>
                            <option {{$service->ordination == 1 ?'selected="selected"':''}} value= 1 >1</option>
                            <option {{$service->ordination == 2 ?'selected="selected"':''}} value= 2 >2</option>
                            <option {{$service->ordination == 3 ?'selected="selected"':''}} value= 3 >3</option>
                            <option {{$service->ordination == 4 ?'selected="selected"':''}} value= 4 >4</option>
                            <option {{$service->ordination == 5 ?'selected="selected"':''}} value= 5 >5</option>
                            <option {{$service->ordination == 6 ?'selected="selected"':''}} value= 6 >6</option>
                            <option {{$service->ordination == 7 ?'selected="selected"':''}} value= 7 >7</option>
                            <option {{$service->ordination == 8 ?'selected="selected"':''}} value= 8 >8</option>
                            <option {{$service->ordination == 9 ?'selected="selected"':''}} value= 9 >9</option>
                            <option {{$service->ordination == 10 ?'selected="selected"':''}} value= 10 >10</option>
                            <option {{$service->ordination == 11 ?'selected="selected"':''}} value= 11 >11</option>
                            <option {{$service->ordination == 12 ?'selected="selected"':''}} value= 12 >12</option>
                            <option {{$service->ordination == 13 ?'selected="selected"':''}} value= 13 >13</option>
                            <option {{$service->ordination == 14 ?'selected="selected"':''}} value= 14 >14</option>
                            <option {{$service->ordination == 15 ?'selected="selected"':''}} value= 15 >15</option>
                            <option {{$service->ordination == 16 ?'selected="selected"':''}} value= 16 >16</option>
                            <option {{$service->ordination == 17 ?'selected="selected"':''}} value= 17 >17</option>
                            <option {{$service->ordination == 18 ?'selected="selected"':''}} value= 18 >18</option>
                            <option {{$service->ordination == 19 ?'selected="selected"':''}} value= 19 >19</option>
                            <option {{$service->ordination == 20 ?'selected="selected"':''}} value= 20 >20</option>
                            <option {{$service->ordination == 21 ?'selected="selected"':''}} value= 21 >21</option>
                            <option {{$service->ordination == 22 ?'selected="selected"':''}} value= 22 >22</option>
                            <option {{$service->ordination == 23 ?'selected="selected"':''}} value= 23 >23</option>
                            <option {{$service->ordination == 24 ?'selected="selected"':''}} value= 24 >24</option>
                        </select>
                    </div>     
                </div>
                <div class="form-group row">
                    <label for="bgcolor" class="ml-4 col-sm-3 col-form-label">Cor do site</label>
                    <div class="col-sm-1">
                        <input type="color" class="form-control" name="bgcolor" id="bgcolor" value="{{$service->bgcolor}}">
                    </div>
                    <label for="bgcolor" class="col-sm-3 col-form-label"></label>
                    <label for="textcolor" class=" col-sm-2 col-form-label">Cor do texto</label>
                    <div class="col-sm-1">
                        <input type="color" class="form-control"name="textcolor" id="textcolor"value="{{$service->textcolor}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="ml-4 col-sm-2 col-form-label" for="image">Imagem capa</label>
                    <div class="col-sm-8">
                        <input type="file" class="uploadImage form-control-file" name="image" id="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="ml-4 col-sm-2 col-form-label" for="imageBody">Imagem conteúdo</label>
                    <div class="col-sm-8">
                        <input type="file" class="uploadImage form-control-file" name="imageBody" id="imageBody">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="ml-4 col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$service->title}}" placeholder="Digite o título do serviço">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="subtitle" class="ml-4 col-sm-2 col-form-label">Subtítulo</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="subtitle" value="{{$service->subtitle}}" placeholder="Digite o sub-título do serviço">
                    </div>
                </div>
                <div class="form-group row">       
                    <label for="email" class="ml-4 col-sm-2 col-form-label">Conteúdo</label>
                    <div class="col-sm-8">
                        <textarea name="body" class="form-control bodyfield" id="body" rows="8">{{$service->content}}</textarea>
                    </div>
                </div> 
                <button type="submit" class="ml-5 mt-2 btn btn-success">Salvar</button>
                <a href="{{route('service.index')}}" class="btn btn-default float-right">Cancelar</a>
            </form>
        </div>
    </div>


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>

tinymce.init({
        selector:'textarea.bodyfield',
        height:300,
        menubar:false,
        plugins:['link','table','image','lists'],
        toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table |link image | bullist numlist',
        content_css:[
            '{{asset('assets/css/content.css')}}'
        ],
        images_upload_url:'{{route('imageupload')}}',
        images_upload_credentials:true,
        convert_urls:false
    });
</script>
@endsection