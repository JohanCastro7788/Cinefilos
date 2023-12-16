@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Silla
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Silla</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sillas.update', $silla->silla_id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('silla.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
