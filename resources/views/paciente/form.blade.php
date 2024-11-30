
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('user_id') }}</label>
    <div>
        {{ Form::text('user_id', $paciente->user_id, ['class' => 'form-control' .
        ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">paciente <b>user_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('condicionvida_id') }}</label>
    <div>
        {{ Form::text('condicionvida_id', $paciente->condicionvida_id, ['class' => 'form-control' .
        ($errors->has('condicionvida_id') ? ' is-invalid' : ''), 'placeholder' => 'Condicionvida Id']) }}
        {!! $errors->first('condicionvida_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">paciente <b>condicionvida_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('habitohigiene_id') }}</label>
    <div>
        {{ Form::text('habitohigiene_id', $paciente->habitohigiene_id, ['class' => 'form-control' .
        ($errors->has('habitohigiene_id') ? ' is-invalid' : ''), 'placeholder' => 'Habitohigiene Id']) }}
        {!! $errors->first('habitohigiene_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">paciente <b>habitohigiene_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('habitoalimento_id') }}</label>
    <div>
        {{ Form::text('habitoalimento_id', $paciente->habitoalimento_id, ['class' => 'form-control' .
        ($errors->has('habitoalimento_id') ? ' is-invalid' : ''), 'placeholder' => 'Habitoalimento Id']) }}
        {!! $errors->first('habitoalimento_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">paciente <b>habitoalimento_id</b> instruction.</small>
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
