@extends('layouts.app')

@section('template_title')
    {{ $sala->name ?? "{{ __('Show') Sala" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Sala</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('salas.bind', $sala->teatro_id) }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Consecutivo:</strong>
                            00{{ $sala->consecutivo }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Sala:</strong>
                            {{ $sala->tipo_sala }}
                        </div>
                        <div class="form-group">
                            <strong>Teatro:</strong>
                            {{ $sala->teatro->teatro_nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
