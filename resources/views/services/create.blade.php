@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Registro de servicios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('service.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                @if (session()->has('message'))
                    <div class="alert alert-success alertdismissible fade show" role="alert">
                        {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            Close
                            <span ariahidden="true">&times;</span>
                        </button>
                    </div>

                @endif
                <input type="text" placeholder="Ingrese el nombre del servicio.." name="servicio" class="form-control">
                <small class="text-danger">{{ $errors->first('servicio') }}</small>
                <label for="">Precio: </label>
                <input type="number" placeholder="Ingrese el precio del servicio.." name="precio" class="form-control">
                <small class="text-danger">{{ $errors->first('precio') }}</small>
                <i class="far fa-images"></i><input accept="image/*"  onchange="vistaPrevia(event)" type="file"  name="foto" class="form-control">
                <small class="text-danger">{{ $errors->first('foto') }}</small>
                <label for="">Sitio</label>
                <select name="sitio_id" class="form-control" id="">
                    <option selected="true" disabled="disabled" value="">
                        seleccione un sitio
                    </option>
                    @foreach ($sites as $site)
                        <option value="{{$site->id}}">{{$site->nombre}}</option>
                    @endforeach
                    <small class="text-danger">{{ $errors->first('sitio_id') }}</small>
                </select>

                <div class="col-md-12 mt-4 text-center">
                    <button type="submit" class="btn btn-secondary">Registrar</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style type="text/css">
        .btn-file {
            position: relative;
            overflow: hidden;
            width: 100px;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        .btn-file i{
            font-size:23px;
        }
        .imagen img{
            max-width: 100%;
            max-height: 50vh;
        }
    </style>
@stop

@section('js')
    <script> 
      function ocultarAlerta() {
            document.querySelector(".alert").style.display = 'none';
        }
        setTimeout(ocultarAlerta,3000);
        let vistaPrevia = ()=>{
            let leerImg = new FileReader();
            let id_img = document.getElementById('img-foto');

            leerImg.onload = ()=>{
                if (leerImg.readyState == 2) {
                    id_img.src = leerImg.result;
                }
            }

            leerImg.readAsDataURL(event.target.files[0])
        }
            
    </script>
@stop