@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <h2 class="pb-2">
                        <i class="fa fa-compass"></i> Vehículos Deseados
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('deseados/create')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>
                    @if(session()->has('message'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="tabla" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">CODIGO</th>
                                <th class="text-center">MARCA</th>
                                <th class="text-center">SERIE</th>
                                <th class="text-center">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deseados as $deseado)
                                <tr class="text-center">
                                    <td>{{$loop -> iteration}}</td>
                                    <td>{{$deseado->nombre}}</td>
                                    <td>{{$deseado->codigo}}</td>
                                    <td>{{$deseado->marca}}</td>
                                    <td>{{$deseado->serie}}</td>
                                    <td>
                                        <a href="{{url('deseados/'.$deseado->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$deseado -> nombre}}', '{{url('deseados/'.$deseado -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('arriba')
        <link href="{{asset('plantilla/assets/plugins/datatables/dataTables.bootstrap4.css')}}" id="theme" rel="stylesheet">
    @endpush
    @push('scripts')
        <script>

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar marca");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la marca: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>
        <script type="text/javascript" charset="utf8" src="{{asset('plantilla/assets/plugins/datatables/datatables.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#tabla').DataTable(
                    {
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
                            "infoEmpty": "",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ filas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "No se encontraron resultados.",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        },
                        "columns": [
                            {"name": "ID"},
                            {"name": "NOMBRE"},
                            {"name": "CODIGO"},
                            {"name": "MARCA"},
                            {"name": "SERIE"},
                            {"name": "OPCIONES", "orderable": false},
                        ],
                        "order": [[0, 'asc']],
                    }
                );

            });
        </script>
    @endpush()
@endsection
