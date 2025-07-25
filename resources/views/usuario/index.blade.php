@extends('plantilla.app')
@section('contenido')
<!--begin::Content-->
<div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Usuarios</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div>
                        <form action="{{route('usuarios.index')}}" method="GET">
                            <div class="input-group">
                                <input type="text" name="buscar" class="form-control" value="" placeholder="Ingrese el texto a buscar">
                                <div class="input-group-append ms-1">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fas fa-search"></i>Buscar
                                    </button>
                                    <a href="{{route('usuarios.create')}}" class="btn btn-primary"> Nuevo</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if(Session::has('mensaje'))
                        <div class="alert alert-info alert-dismissible fade show mt-2">
                            {{ Session::get('mensaje') }}
                            <button type="button" class="btn-close" data-bs-dismiss="close"></button>
                        </div>
                    @endsession

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 100px">Opciones</th>
                                    <th style="width: 20px">ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Activo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($registros->isEmpty())
                                    <tr class="align-middle">
                                        <td colspan="5">No se encontró registros que coincidan con la busqueda</td>
                                    </tr>
                                @else
                                    @foreach($registros as $registro)
                                        <tr class="align-middle">
                                            <td>
                                                <a href="{{route('usuarios.edit', $registro->id)}}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-eliminar-{{$registro->id}}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </td>
                                            <td>{{ $registro->id }}</td>
                                            <td>{{ $registro->name }}</td>
                                            <td>{{ $registro->email }}</td>
                                            <td>{{ $registro->activo == 1 ? 'Activo' : 'Inactivo' }}</td>
                                        </tr>
                                        @include('usuario.delete')
                                    @endforeach
                                @endif  
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $registros->appends(["buscar"=>$buscar]) }} 
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!--end::Row-->
</div>
@endsection
<!--end::Content-->
@push('scripts')
<script>
    document.getElementById('mnuSeguridad').classList.add('menu-open'); // Open the Seguridad menu
    document.getElementById('itemUsuario').classList.add('active'); // Set the Usuario item as active
</script>
@endpush