<div class="modal fade" id="modal-eliminar-{{$registro->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-eliminar-01-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <form action="{{ route('usuarios.destroy', $registro->id)}}" method="POST">
            @csrf
            @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-eliminar-01-label">Eliminar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de eliminar el usuario: {{ $registro->name }}?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-light">Eliminar</button>
                </div>
            </form>
        </div>
    </div>

</div>