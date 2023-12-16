<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('Consecutivo') }}
            {{ Form::text('consecutivo', '00' . $sala->consecutivo, ['class' => 'form-control' . ($errors->has('consecutivo') ? ' is-invalid' : ''), 'placeholder' => 'Consecutivo', 'readonly']) }}
            {!! $errors->first('consecutivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo de sala') }}
            {{ Form::select('tipo_sala', ['2d' => '2D', '3d' => '3D'], $sala->tipo_sala, ['class' => 'form-select']) }}
            {!! $errors->first('tipo_sala', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Teatro') }}
            {{ Form::select('teatro_id', [$teatro->teatro_id => $teatro->teatro_nombre], $sala->teatro_id, ['class' => 'form-select', 'readonly']) }}
            {!! $errors->first('teatro_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt-4">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
