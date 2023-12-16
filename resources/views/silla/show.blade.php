@extends('layouts.app')

@section('template_title')
    {{ $silla->name ?? "{{ __('Show') Silla" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Silla</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sillas.bind', $silla->sala_id) }}">
                                {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Consecutivo:</strong>
                            {{ $silla->concecutivo }}
                        </div>
                        <div class="form-group">
                            <strong>Sala</strong>
                            00{{ $silla->sala->consecutivo }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Silla:</strong>
                            {{ $silla->tipo_silla }}
                        </div>
                        <div class="form-group">
                            <strong>Columna:</strong>
                            {{ $silla->columna }}
                        </div>
                        <div class="form-group">
                            <strong>Numero:</strong>
                            {{ $silla->numero }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
