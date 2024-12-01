
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('medico_id') }}</label>
    <div>
        {{ Form::text('medico_id', $disponible->medico_id, ['class' => 'form-control' .
        ($errors->has('medico_id') ? ' is-invalid' : ''), 'placeholder' => 'Medico Id']) }}
        {!! $errors->first('medico_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">disponible <b>medico_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha') }}</label>
    <div>
        {{ Form::text('fecha', $disponible->fecha, ['class' => 'form-control' .
        ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
        {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">disponible <b>fecha</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('hora') }}</label>
    <div>
        {{ Form::text('hora', $disponible->hora, ['class' => 'form-control' .
        ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
        {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">disponible <b>hora</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('estado') }}</label>
    <div>
        {{ Form::text('estado', $disponible->estado, ['class' => 'form-control' .
        ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">disponible <b>estado</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
