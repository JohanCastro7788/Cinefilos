@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <section class="container mb-4">

                    <div class="row">
                        @foreach ($funcions as $funcion)
                            <div class="col-md-4 col-xs-3">
                                <div class="card h-100" style="width: 250px">
                                    <img src="{{ asset('images/generica.jpg') }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $funcion->pelicula->peli_nombre }} </h5>
                                        <p class="card-text">{{ $funcion->pelicula->peli_descrip }}</p>
                                        <div class="form-group">
                                            <strong>Fecha y hora:</strong>
                                            {{ $funcion->fecha_hora_func }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Duración:</strong>
                                            {{ $funcion->pelicula->peli_duracion }}
                                        </div>
                                        <div class="form-group">
                                            <strong>Teatro:</strong>
                                            {{ $funcion->sala->teatro->teatro_nombre }}
                                        </div>

                                        <a href="#" class="btn btn-primary mt-4">Comprar Tickets</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
