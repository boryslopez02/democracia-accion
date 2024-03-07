@extends('layouts.app')

@section('styles')
<style>
    .table-responsive {
        min-height: 80vh;
    }
</style>
@endsection

@section('content')
    <div class="table-responsive">
        <table id="datatable-members" class="table border table-striped table-bordered text-nowrap align-middle dataTableCurrent">
            <thead>
                <!-- start row -->
                <tr>
                    <th>Nombre Completo</th>
                    {{-- <th>CI</th> --}}
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>F. Nacimiento</th>
                    <th>Cargo</th>
                    <th>Buró</th>
                    <th>Acciones</th>
                </tr>
                <!-- end row -->
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <!-- start row -->
                <tr>
                    <th>Nombre Completo</th>
                    {{-- <th>CI</th> --}}
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>F. Nacimiento</th>
                    <th>Cargo</th>
                    <th>Buró</th>
                    <th>Acciones</th>
                </tr>
                <!-- end row -->
            </tfoot>
        </table>
    </div>
@endsection

@section('page-scripts')
    <script>
        let table = $('#datatable-members').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 25,
            lengthMenu: [10, 25, 50, 100],
            ajax: '{{ route("members.list") }}',
            columns: [
                { data: 'nombre_completo', name: 'nombre_completo' },
                // { data: 'apellido', name: 'apellido' },
                // { data: 'cedula', name: 'cedula' },
                { data: 'telefono', name: 'telefono' },
                { data: 'correo', name: 'correo' },
                { data: 'fecha_nacimiento', name: 'fecha_nacimiento' },
                { data: 'cargo', name: 'cargo' },
                // { data: 'tipo_cargo', name: 'tipo_cargo' },
                { data: 'buro', name: 'buro' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            language: {
                processing:     "Procesando...",
                search:         "Buscar:",
                lengthMenu:    "Mostrar _MENU_ registros",
                info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
                infoFiltered:   "(filtrado de un total de _MAX_ registros)",
                infoPostFix:    "",
                loadingRecords: "Cargando...",
                zeroRecords:    "No se encontraron resultados",
                emptyTable:     "Ningún dato disponible en esta tabla",
                paginate: {
                    first:      '<i class="fa fa-step-backward" style="color: #5D87FF;"></i>',
                    previous:   '<i class="ti ti-arrow-left" style="color: #5D87FF;"></i>',
                    next:       '<i class="ti ti-arrow-right" style="color: #5D87FF;"></i>',
                    last:       '<i class="fa fa-step-forward" style="color: #5D87FF;"></i>'
                },
                aria: {
                    sortAscending:  ": Activar para ordenar la columna de manera ascendente",
                    sortDescending: ": Activar para ordenar la columna de manera descendente"
                }
            },
            initComplete: function() {
                // $('select[name="datatable-members_length"]').select2();
            },
        });
    </script>
@endsection
