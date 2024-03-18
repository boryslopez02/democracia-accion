@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Actualizar Usuario</h5>
                <form class="row">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Cedula</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Genero</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Profesion</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    {{-- <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Red Social</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="">
                    </div> --}}
                    {{-- <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Alcance</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Seccional</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Municipio</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Parroquia</label>
                        <input type="text" class="form-control" id="">
                    </div> --}}
                    {{-- <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Clave</label>
                        <input type="password" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Confirmar Clave</label>
                        <input type="password" class="form-control" id="">
                    </div> --}}
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
