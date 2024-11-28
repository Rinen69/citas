
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('desc') }}</label>
    <div>
        {{ Form::text('desc', $product->desc, ['class' => 'form-control' .
        ($errors->has('desc') ? ' is-invalid' : ''), 'placeholder' => 'Desc']) }}
        {!! $errors->first('desc', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">product <b>desc</b> instruction.</small>
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
