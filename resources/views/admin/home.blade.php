@extends('adminlte::page')

@section('plugins.Chartjs', true)
    
@section('css')
<link rel="icon" href="{!!asset('assets/images/favicon.ico')!!}" type="image/x-icon">
    
@endsection
@section('title', 'Painel')

{{-- @section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-md-6">
            <form method="get">
                <select style="width:160px" onChange="this.form.submit()" name="interval" id="interval" class="form-control float-md-right">
                    <option {{$dateInterval==30?'selected="selected"':''}} value="30">Últimos 30 dias</option>
                    <option {{$dateInterval==60?'selected="selected"':''}} value="60">Últimos 60 dias</option>
                    <option {{$dateInterval==90?'selected="selected"':''}} value="90">Últimos 90 dias</option>
                    <option {{$dateInterval==120?'selected="selected"':''}} value="120">Últimos 120 dias</option>
                </select>
            </form>
        </div>
    </div>
@endsection --}}

@section('content')
<div style="height:80vh;" class="d-flex justify-content-center align-items-center">
    <img width="480" class="img-responsive img-fluid" src="{{asset('assets/images/logo-preto.png')}}" alt="">
</div>

    {{-- <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$visitsCount}}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$onlineCount}}</h3>
                    <p>Serviços</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="small-box bg-warning">
                <div style="color:#fff;" class="inner">
                    <h3>{{$pageCount}}</h3>
                    <p>Blogs</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-file"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$userCount}}</h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-users"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Páginas mais visitadas</h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePie"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Sobre o Sistema</h3>
                </div>
                <div class="card-body">
                    ...
                </div>
            </div>
        </div>
    </div>
<script>
    window.onload = function(){
        let ctx = document.getElementById('pagePie').getContext('2d');
        window.pagePie = new Chart(ctx, {
            type:'pie',
            data:{
                datasets:[{
                    data:{{$pageValues}},
                    backgroundColor:['#3333ff','#33ff33','#ff3333']
                }],
                labels:{!! $pageLabels !!}
            },
            options:{
                responsive:true,
                legend:{
                    display:false
                }
            }
        });
    }
</script> --}}
@endsection