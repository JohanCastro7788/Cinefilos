@extends('layouts.app')

@section('template_title')
    {{ $pelicula->name ?? "{{ __('Show') Pelicula" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pelicula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('peliculas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pelicula Id:</strong>
                            {{ $pelicula->pelicula_id }}
                        </div>
                        <div class="form-group">
                            <strong>Peli Nombre:</strong>
                            {{ $pelicula->peli_nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Peli Descrip:</strong>
                            {{ $pelicula->peli_descrip }}
                        </div>
                        <div class="form-group">
                            <strong>Peli Duracion:</strong>
                            {{ $pelicula->peli_duracion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
