<div class="box box-info padding-1">
    <div class="box-body">


        @if (!$opcionMultiple)
            <div class="form-group">
                {{ Form::label('Consecutivo') }}
                {{ Form::text('concecutivo', $silla->concecutivo, ['class' => 'form-control' . ($errors->has('concecutivo') ? ' is-invalid' : ''), 'placeholder' => 'concecutivo']) }}
                {!! $errors->first('concecutivo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif
        <div class="form-group">
            {{ Form::label('Sala') }}
            {{ Form::select('sala_id', [$sala->sala_id => '00' . $sala->consecutivo], $sala->teatro_id, ['class' => 'form-select', 'readonly']) }}
            {!! $errors->first('sala_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo de silla') }}
            {{ Form::select('tipo_silla', ['general' => 'GENERAL', 'vip' => 'VIP'], $silla->tipo_silla, ['class' => 'form-select']) }}
            {!! $errors->first('tipo_silla', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('columna') }}
            {{ Form::text('columna', $silla->columna, ['class' => 'form-control' . ($errors->has('columna') ? ' is-invalid' : ''), 'placeholder' => 'Columna']) }}
            {!! $errors->first('columna', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero') }}
            {{ Form::text('numero', $silla->numero, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Numero']) }}
            {!! $errors->first('numero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if ($opcionMultiple)
            <div class="form-group">
                <label for="">Continuar hacia la derecha</label>
                <input type="number" name="cantidad_derecha" id="cantidad_derecha" value="0" class="form-control">
            </div>
        @endif

    </div>
    <div class="box-footer mt-4">
        <button type="submit" class="btn btn-primary">{{ __('Guardar ') }}</button>
    </div>
</div>
