<x-app-layout>
    @include('layouts.navigation')
    <div class="container">
        <div class="mt-4 p-12">
            <div class="card-body">
                <div class="row p-12">
                    <div class="col-6">
                        <img src="{{asset('img/'.$site->foto)}}" alt="">
                        <h2>Sitio: {{$site->nombre}}</h2>
                        <p>Descripcion: {{$site->descripcion}}</p>
                    </div>
                    <div class="col-6 mt-6">
                        <form action="{{route('reservation.store')}}" method="post">
                            @csrf
                            <label for="">Fecha: </label>
                            <input type="date" name="fecha" placeholder="ingresar la fecha de reserva.." class="form-control">
                            <label for="">Hora: </label>
                            <input type="time" name="hora" placeholder="ingresar hora de reserva.." class="form-control">
                            <label for="">Numero de personas: </label>
                            <input type="number" name="numero_personas" placeholder="numero personas.." class="form-control">
                            <input type="hidden" name="sitio_id" value="{{$site->id}}">

                            <label for="">Servicio</label>
                                <select name="servicio_id" class="form-control" id="">
                                    <option disabled="disabled" value="">
                                        seleccione un sitio
                                    </option>
                                    @foreach ($services as $service)
                                        <option value="{{$service->id}}">{{$service->servicio}} | {{$service->precio}}</option>
                                    @endforeach
                                    <small class="text-danger">{{$errors->first('servicio_id')}}</small>
                                </select>
                            <button type="submit" class="btn btn-primary" >Reservar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>