@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Registro de servicios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('service.store')}}" method="post">
                @csrf
                <input type="text" placeholder="Ingrese el nombre del servicio.." name="servicio" class="form-control">
                <small class="text-danger">{{ $errors->first('servicio') }}</small>
                <label for="">Precio: </label>
                <input type="number" placeholder="Ingrese el precio del servicio.." name="precio" class="form-control">
                <small class="text-danger">{{ $errors->first('precio') }}</small>
                <input type="text" placeholder="Ingrese fotografia del servicio.." name="foto" class="form-control">
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
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop