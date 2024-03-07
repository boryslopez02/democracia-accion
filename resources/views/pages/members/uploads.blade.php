@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/libs/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body position-relative">
                <h5 class="card-title fw-semibold mb-4">Carga masiva de miembros</h5>
                <form class="row" method="POST" action="{{ route('members.save-members') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <p class="mb-0">El archivo debe cumplir con la siguiente estructura para el correcto guardado de los miembros. <br> nombre, apellido, ci</p>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="" class="form-label">Solo se admiten archivos con extensiones <span class="text-danger">.xls, .xlsx y .txt.</span></label>
                        <input type="file" class="form-control" id="">
                    </div>
                    <div class="col-12 align-self-end">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
                <div class="position-absolute top-50 start-50 translate-middle glassContainer">
                    <img src="{{ asset('assets/images/logos/logo.png') }}" class="glassLogo" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/libs/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/forms/select2.init.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/forms/datepicker-init.js') }}"></script>
@endsection
