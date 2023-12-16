@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Funcion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Funcion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('funcions.update', $funcion->funcion_id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('funcion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
