<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <div class="form-group">
                {{ Form::label('Ciudad') }}
                {{ Form::select('cod_ciudad', $ciudades, $teatro->cod_ciudad, ['class' => 'form-select']) }}
                {!! $errors->first('cod_ciudad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('teatro_nombre') }}
                {{ Form::text('teatro_nombre', $teatro->teatro_nombre, ['class' => 'form-control' . ($errors->has('teatro_nombre') ? ' is-invalid' : ''), 'placeholder' => 'Teatro Nombre']) }}
                {!! $errors->first('teatro_nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('direccion') }}
                {{ Form::text('direccion', $teatro->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div class="box-footer mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        </div>
    </div>
