<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/js/datatable-basic.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/main.js') }}"></script>
<script src="{{ asset('assets/libs/toastr/js/toastr-init.js') }}"></script>
@yield('page-scripts')
{{--
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Éxito!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error:</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}

<script>
    // Verifica si hay mensajes de éxito o error en la sesión y los pasa a JavaScript
    var successMessage = "{{ session('success') }}";
    var errorMessage = "{{ session('error') }}";

    document.addEventListener('DOMContentLoaded', function () {
        if (successMessage !== "") {
            toastr.success(successMessage, "¡Éxito!", {
                progressBar: true,
            });
        }

        if (errorMessage !== "") {
            toastr.error(errorMessage, "Error", {
                progressBar: true,
            });
        }
    });
</script>
