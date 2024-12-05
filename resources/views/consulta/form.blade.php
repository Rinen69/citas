<div class="form-group mb-3">
    <label for="pacienteNombre" class="form-label">Paciente</label>
    <!-- Mostrar el nombre del paciente autenticado -->
    <input type="text" id="pacienteNombre" class="form-control" value="{{ $paciente->user->name ?? 'No disponible' }}" disabled>
    <!-- Campo oculto para enviar el ID del paciente -->
    <input type="hidden" name="paciente_id" value="{{ $paciente->id ?? '' }}">
</div>

<div class="form-group mb-3">
    <label for="servicioSelect" class="form-label">Seleccionar servicio</label>
    <select name="servicio_id" id="servicioSelect" class="form-control" required>
        <option value="" selected disabled>-- Selecciona un servicio --</option>
        @foreach ($servicios as $servicio)
            <option value="{{ $servicio->id }}">{{ $servicio->descripcion }}</option>
        @endforeach
    </select>    
</div>

<div class="form-group mb-3">
    <label for="disponibleSelect" class="form-label">Seleccionar disponibilidad</label>
    <select id="disponibleSelect" name="disponible_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona una disponibilidad --</option>
        <!-- Aquí se llenarán las opciones de disponibilidad -->
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Cuando el usuario selecciona un servicio
    $('#servicioSelect').on('change', function() {
        const servicioId = $(this).val();

        // Verificar si se ha seleccionado un servicio válido
        if (!servicioId) {
            return;
        }

        console.log('Servicio seleccionado:', servicioId); // Ver la selección en la consola

        // Realizamos la petición AJAX para obtener las disponibilidades para el servicio seleccionado
        $.ajax({
            url: '/get-disponibles-servicio/' + servicioId,
            method: 'GET',
            success: function(response) {
                console.log('Respuesta recibida:', response); // Ver la respuesta en la consola

                // Limpiamos el select de disponibilidades antes de añadir los nuevos datos
                $('#disponibleSelect').empty().append('<option value="" selected disabled>-- Selecciona una disponibilidad--</option>');

                // Añadimos las nuevas disponibilidades y el nombre del médico
                if (response.length > 0) {
                    response.forEach(function(disponible) {
                        console.log('Añadiendo disponibilidad:', disponible);
                        $('#disponibleSelect').append(new Option(disponible.fecha + ' ' + disponible.hora + ' ' + disponible.medico_nombre, disponible.disponible_id));
                    });
                } else {
                    $('#disponibleSelect').append('<option value="" disabled>No hay horarios disponibles</option>');
                }
            },
            error: function(xhr) {
                console.log('Error:', xhr); // Log del error en caso de fallo
                if (xhr.status === 404) {
                    // Si no hay disponibilidad, limpiamos el select y mostramos un mensaje
                    $('#disponibleSelect').empty().append('<option value="" disabled>No hay horarios disponibles para este servicio</option>');
                    alert('No hay disponibilidades para este servicio.');
                } else {
                    alert('Error al obtener las disponibilidades');
                }
            }
        });
    });
});

</script>