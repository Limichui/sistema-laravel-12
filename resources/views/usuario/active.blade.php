<div class="modal fade" id="modal-toggle-{{ $registro->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-toggle-{{ $registro->id }}-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content {{ $registro->activo ? 'bg-warning' : 'bg-success' }}">
            <form action="{{ route('usuarios.toggle', $registro->id)}}" method="POST">
            @csrf
            @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-toggle-{{ $registro->id }}-label">{{ $registro->activo ? 'Desactivar' : 'Activar' }} usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de {{ $registro->activo ? 'desactivar' : 'activar' }} el registro de usuario: {{ $registro->name }}?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-light">{{ $registro->activo ? 'Desactivar' : 'Activar' }}</button>
                </div>
            </form>
        </div>
    </div>

</div>