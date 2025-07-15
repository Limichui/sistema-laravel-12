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
                        <form action="" method="GET">
                            <div class="input-group">
                                <input type="text" name="texto" class="form-control" value="" placeholder="Ingrese el texto a buscar">
                                <div class="input-group-append ms-1">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fas fa-search"></i>Buscar
                                    </button>
                                    <a href="" class="btn btn-primary"> Nuevo</a>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 100px">Opciones</th>
                                    <th style="width: 20px">ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-eliminar-01">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </td>
                                    <td>01</td>
                                    <td>Limbert Olmos Mercado</td>
                                    <td>limichui.developer@gmail.com</td>
                                </tr>
                                @include('usuario.delete')
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
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