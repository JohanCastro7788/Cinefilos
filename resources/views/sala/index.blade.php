@extends('layouts.app')

@section('template_title')
    Sala
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sala') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('salas.tecreate', $teatro->teatro_id) }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear Sala') }}
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

                                        <th>Consecutivo</th>
                                        <th>Tipo Sala</th>
                                        <th>Teatro</th>
                                        <th>Cantidad de sillas
                                        <th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salas as $sala)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>00{{ $sala->consecutivo }}</td>
                                            <td>{{ $sala->tipo_sala }}</td>
                                            <td>{{ $teatro->teatro_nombre }}</td>
                                            <td>{{ $sala->sillas_count }}</td>

                                            <td>
                                                <form action="{{ route('salas.destroy', $sala->sala_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('salas.show', $sala->sala_id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('salas.edit', $sala->sala_id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>

                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('sillas.bind', $sala->sala_id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Sillas') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $salas->links() !!}
            </div>
        </div>
    </div>
@endsection
