
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('consulta_id') }}</label>
    <select name="consulta_id" id="consulta_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona una consulta --</option>
        @foreach ($consultas as $consulta)
            <option value="{{ $consulta->id }}">{{ $consulta->paciente->user->name }} {{ $consulta->paciente->user->ap }} {{ $consulta->paciente->user->am }}</option>
        @endforeach
    </select>   
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('peso') }}</label>
    <div>
        {{ Form::number('peso', $triaje->peso, ['class' => 'form-control' .
        ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso', 'step' => 'any', 'min' => '0']) }}
        {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>peso</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('talla') }}</label>
    <div>
        {{ Form::number('talla', $triaje->talla, ['class' => 'form-control' .
        ($errors->has('talla') ? ' is-invalid' : ''), 'placeholder' => 'Talla', 'step' => 'any', 'min' => '0'])  }}
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
        {{ Form::number('saturacionoxigeno', $triaje->saturacionoxigeno, ['class' => 'form-control' .
        ($errors->has('saturacionoxigeno') ? ' is-invalid' : ''), 'placeholder' => 'Saturacionoxigeno']) }}
        {!! $errors->first('saturacionoxigeno', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>saturacionoxigeno</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('temperatura') }}</label>
    <div>
        {{ Form::number('temperatura', $triaje->temperatura, ['class' => 'form-control' .
        ($errors->has('temperatura') ? ' is-invalid' : ''), 'placeholder' => 'Temperatura']) }}
        {!! $errors->first('temperatura', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>temperatura</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('frecuenciarespiratoria') }}</label>
    <div>
        {{ Form::number('frecuenciarespiratoria', $triaje->frecuenciarespiratoria, ['class' => 'form-control' .
        ($errors->has('frecuenciarespiratoria') ? ' is-invalid' : ''), 'placeholder' => 'Frecuenciarespiratoria']) }}
        {!! $errors->first('frecuenciarespiratoria', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">triaje <b>frecuenciarespiratoria</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('frecuenciacardiaca') }}</label>
    <div>
        {{ Form::number('frecuenciacardiaca', $triaje->frecuenciacardiaca, ['class' => 'form-control' .
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
