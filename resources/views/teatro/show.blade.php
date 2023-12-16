@extends('layouts.app')

@section('template_title')
    {{ $teatro->name ?? "{{ __('Show') Teatro" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Teatro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('teatros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">


                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $teatro->ciudad->nombre_ciu }}
                        </div>
                        <div class="form-group">
                            <strong>Teatro Nombre:</strong>
                            {{ $teatro->teatro_nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $teatro->direccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
