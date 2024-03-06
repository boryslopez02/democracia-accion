@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Registrar Usuario</h5>
                <form class="row">
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Cedula</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Profesion</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Red Social</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Genero</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
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
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Tipo de Cargo</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Cargo</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Buro</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Responsabilidad</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4 align-self-end">
                        <label for="" class="form-label me-3">Usuario</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Clave</label>
                        <input type="password" class="form-control" id="">
                    </div>
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Confirmar Clave</label>
                        <input type="password" class="form-control" id="">
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
