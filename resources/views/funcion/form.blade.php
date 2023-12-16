<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('Pelicula') }}
            {{ Form::select('pelicula_id', $list_peliculas, $funcion->pelicula_id, ['class' => 'form-select']) }}
            {!! $errors->first('pelicula_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Lugar de función') }}
            {{ Form::select('sala_id', $list_teatros, $funcion->sala_id, ['class' => 'form-select']) }}
            {!! $errors->first('sala_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de la función') }}
            {{ Form::date('fecha_func', $funcion->fecha_func, ['class' => 'form-control' . ($errors->has('fecha_func') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Hora Func']) }}
            {!! $errors->first('fecha_func', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Hora de la función') }}
            {{ Form::time('hora_func', $funcion->hora_func, ['class' => 'form-control' . ($errors->has('hora_func') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Hora Func']) }}
            {!! $errors->first('hora_func', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valor de la función') }}
            {{ Form::number('valor_func', $funcion->valor_func, ['class' => 'form-control' . ($errors->has('valor_func') ? ' is-invalid' : ''), 'placeholder' => 'Valor Func']) }}
            {!! $errors->first('valor_func', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-4">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
