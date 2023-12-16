@extends('layouts.app')

@section('template_title')
    Silla
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Sillas de la sala 00' . strval($sala->consecutivo)) }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('sillas.porsala.create', $sala->sala_id) }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Concecutivo</th>
                                        <th>Tipo Silla</th>
                                        <th>Columna</th>
                                        <th>Numero</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sillas as $silla)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $silla->concecutivo }}</td>
                                            <td>{{ $silla->tipo_silla }}</td>
                                            <td>{{ $silla->columna }}</td>
                                            <td>{{ $silla->numero }}</td>

                                            <td>
                                                <form action="{{ route('sillas.destroy', $silla->silla_id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('sillas.show', $silla->silla_id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('sillas.edit', $silla->silla_id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sillas->links() !!}
            </div>
        </div>
    </div>
@endsection
