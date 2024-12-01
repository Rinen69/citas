
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('consulta_id') }}</label>
    <div>
        {{ Form::text('consulta_id', $triaje->consulta_id, ['class' => 'form-control' .
        ($errors->has('consulta_id') ? ' is-invalid' : ''), 'placeholder' => 'Consulta Id']) }}
        {!! $errors->first('consulta_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>consulta_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('peso') }}</label>
    <div>
        {{ Form::text('peso', $triaje->peso, ['class' => 'form-control' .
        ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
        {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>peso</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('talla') }}</label>
    <div>
        {{ Form::text('talla', $triaje->talla, ['class' => 'form-control' .
        ($errors->has('talla') ? ' is-invalid' : ''), 'placeholder' => 'Talla']) }}
        {!! $errors->first('talla', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>talla</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tensionarterial') }}</label>
    <div>
        {{ Form::text('tensionarterial', $triaje->tensionarterial, ['class' => 'form-control' .
        ($errors->has('tensionarterial') ? ' is-invalid' : ''), 'placeholder' => 'Tensionarterial']) }}
        {!! $errors->first('tensionarterial', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>tensionarterial</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('saturacionoxigeno') }}</label>
    <div>
        {{ Form::text('saturacionoxigeno', $triaje->saturacionoxigeno, ['class' => 'form-control' .
        ($errors->has('saturacionoxigeno') ? ' is-invalid' : ''), 'placeholder' => 'Saturacionoxigeno']) }}
        {!! $errors->first('saturacionoxigeno', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>saturacionoxigeno</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('temperatura') }}</label>
    <div>
        {{ Form::text('temperatura', $triaje->temperatura, ['class' => 'form-control' .
        ($errors->has('temperatura') ? ' is-invalid' : ''), 'placeholder' => 'Temperatura']) }}
        {!! $errors->first('temperatura', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>temperatura</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('frecuenciarespiratoria') }}</label>
    <div>
        {{ Form::text('frecuenciarespiratoria', $triaje->frecuenciarespiratoria, ['class' => 'form-control' .
        ($errors->has('frecuenciarespiratoria') ? ' is-invalid' : ''), 'placeholder' => 'Frecuenciarespiratoria']) }}
        {!! $errors->first('frecuenciarespiratoria', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>frecuenciarespiratoria</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('frecuenciacardiaca') }}</label>
    <div>
        {{ Form::text('frecuenciacardiaca', $triaje->frecuenciacardiaca, ['class' => 'form-control' .
        ($errors->has('frecuenciacardiaca') ? ' is-invalid' : ''), 'placeholder' => 'Frecuenciacardiaca']) }}
        {!! $errors->first('frecuenciacardiaca', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>frecuenciacardiaca</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('observacion') }}</label>
    <div>
        {{ Form::text('observacion', $triaje->observacion, ['class' => 'form-control' .
        ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
        {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>observacion</b> instruction.</small>
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