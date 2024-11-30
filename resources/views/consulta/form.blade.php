<div class="form-group mb-3">
    <label class="form-label">Paciente</label>
    <!-- Mostrar el nombre del paciente autenticado -->
    <input type="text" class="form-control" value="{{ $paciente->user->name ?? 'No disponible' }}" disabled>
    <!-- Campo oculto para enviar el ID del paciente -->
    <input type="hidden" name="paciente_id" value="{{ $paciente->id ?? '' }}">
</div>

<div class="form-group mb-3">
    <label class="form-label">Servicio</label>
    <select name="servicio_id" id="servicio_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona un servicio --</option>
        @foreach ($servicios as $servicio)
            <option value="{{ $servicio->id }}">{{ $servicio->descripcion }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label class="form-label">Horario disponible</label>
    <select name="disponible_id" id="disponible_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona un horario --</option>
    </select>
</div>



<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('consultas.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto">Guardar</button>
        </div>
    </div>
</div>
@section('scripts')
<script>
document.getElementById('servicio_id').addEventListener('change', function () {
    const servicioId = this.value;
    const disponibleSelect = document.getElementById('disponible_id');

    // Limpiar las opciones actuales
    disponibleSelect.innerHTML = '<option value="" selected disabled>-- Selecciona un horario --</option>';

    if (servicioId) {
        fetch(`/get-disponibles?servicio_id=${servicioId}`, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta de la API');
                }
                return response.json();
            })
            .then(data => {
                if (data.length > 0) {
                    data.forEach(disponible => {
                        const option = document.createElement('option');
                        option.value = disponible.id;
                        option.textContent = `${disponible.fecha} - ${disponible.hora}`;
                        disponibleSelect.appendChild(option);
                    });
                } else {
                    const option = document.createElement('option');
                    option.value = "";
                    option.textContent = "No hay horarios disponibles para este servicio";
                    disponibleSelect.appendChild(option);
                }
            })
            .catch(error => console.error('Error al cargar los horarios:', error));
    }
});

</script>
@endsection
