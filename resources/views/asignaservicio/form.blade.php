<div class="form-group mb-3">
    <label for="servicio_id" class="form-label">Seleccionar servicio</label>
    <select name="servicio_id" id="servicio_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona una servicio --</option>
        @foreach ($servicios as $servicio)
            <option value="{{ $servicio->id }}">{{ $servicio->descripcion }}</option>
        @endforeach
    </select>    
</div>     
<div class="form-group mb-3">
    <label for="medico_id" class="form-label">Seleccionar usuario</label>
    <select name="medico_id" id="medico_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona una medico --</option>
        @foreach ($medicos as $medico)
            <option value="{{ $medico->id }}">{{ $medico->user->name}}</option>
        @endforeach
    </select>    
</div>     

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
