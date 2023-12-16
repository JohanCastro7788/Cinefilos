@extends('layouts.app')

@section('template_title')
    {{ $funcion->name ?? "{{ __('Show') Funcion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Funcion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('funcions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Pelicula:</strong>
                            {{ $funcion->pelicula->peli_nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Sala:</strong>
                            {{ $funcion->sala->teatro->teatro_nombre }} - 00{{ $funcion->sala->consecutivo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Hora Funcion:</strong>
                            {{ $funcion->fecha_hora_func }}
                        </div>
                        <div class="form-group">
                            <strong>Duración</strong>
                            {{ $funcion->pelicula->peli_duracion }} Minutos
                        </div>
                        <div class="form-group">
                            <strong>Valor Funcion:</strong>
                            {{ $funcion->valor_func }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
