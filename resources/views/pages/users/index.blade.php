@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <table id="table-users" class="table border table-striped table-bordered text-nowrap align-middle dataTableCurrent">
            <thead>
                <!-- start row -->
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
                <!-- end row -->
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <!-- start row -->
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
                <!-- end row -->
            </tfoot>
        </table>
    </div>
@endsection


@section('page-scripts')
    <script>
        window.urlUsers = '{{ route("users.list") }}';
    </script>
    <script src="{{ asset('assets/js/pages/users/users.js') }}"></script>
@endsection
