<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre de la pelicula') }}
            {{ Form::text('peli_nombre', $pelicula->peli_nombre, ['class' => 'form-control' . ($errors->has('peli_nombre') ? ' is-invalid' : ''), 'placeholder' => 'Peli Nombre']) }}
            {!! $errors->first('peli_nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('peli_descrip', $pelicula->peli_descrip, ['class' => 'form-control' . ($errors->has('peli_descrip') ? ' is-invalid' : ''), 'placeholder' => 'Peli Descrip']) }}
            {!! $errors->first('peli_descrip', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Duración (minutos)') }}
            {{ Form::number('peli_duracion', $pelicula->peli_duracion, ['class' => 'form-control' . ($errors->has('peli_duracion') ? ' is-invalid' : ''), 'placeholder' => 'Peli Duracion']) }}
            {!! $errors->first('peli_duracion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-4">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
