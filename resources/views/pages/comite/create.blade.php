@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/libs/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<style>

</style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body position-relative py-3 px-0">
                <div class="row p-3 m-0">
                    <div class="col-12">
                        <h5 class="card-title fw-semibold">Registrar Comite Local</h5>
                    </div>
                </div>
                <form class="row m-0" method="POST" action="{{ route('members.comiteStore') }}">
                    @csrf

                    <div class="row p-3 m-0">
                        <!-- Nombre del comite -->
                        <div class="mb-3 col-lg-6">
                            <label for="nombre_comite" class="form-label">Nombre del comite</label>
                            <input type="text" class="form-control @error('nombre_comite') is-invalid @enderror" id="nombre_comite" name="nombre_comite" value="{{ old('nombre_comite') }}">
                            @error('nombre_comite')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row bg-light-subtle p-3 m-0">
                        <!-- Seccional -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="seccional" class="form-label">Seccional</label>
                            <select class="form-control select2 @error('seccional') is-invalid @enderror" id="seccional" name="seccional">
                                <option value="">Seleccionar</option>
                                @foreach ($seccionales as $seccional)
                                    @php
                                        $nombre = str_replace('EDO. ', '', $seccional->nombre);
                                    @endphp
                                    <option value="{{ $seccional->id }}">{{ $nombre }}</option>
                                @endforeach
                            </select>
                            @error('seccional')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Municipio -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="municipio" class="form-label">Municipio</label>
                            <select class="form-control select2 @error('municipio') is-invalid @enderror" id="municipio" name="municipio">
                                <option value="">Seleccionar</option>
                            </select>
                            @error('municipio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Parroquia -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="parroquia" class="form-label">Parroquia</label>
                            <select class="form-control select2 @error('parroquia') is-invalid @enderror" id="parroquia" name="parroquia" value="{{ old('parroquia') }}">
                                <option value="">Seleccionar</option>
                            </select>
                            @error('parroquia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- PRIMER MIEMBRO --}}
                    <div class="row p-3 m-0">
                        <div class="col-12">
                            <h5 class="card-title fw-semibold">1. Miembro</h5>
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Cedula -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="cedula" class="form-label">Cedula</label>
                            <input type="text" class="form-control @error('cedula') is-invalid @enderror" id="cedula" name="cedula[]" value="{{ old('cedula') }}">
                            @error('cedula')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="nombre" class="form-label">Nombres</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre[]" value="{{ old('nombre') }}">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="apellido" class="form-label">Apellidos</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido[]" value="{{ old('apellido') }}">
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">

                        <!-- Fecha de nacimiento  -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento[]" value="{{ old('fecha_nacimiento') }}" placeholder="mm/dd/yyyy" autocomplete="off">
                                <span class="input-group-text">
                                  <i class="ti ti-calendar fs-5"></i>
                                </span>
                            </div>
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Genero -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="genero" class="form-label">Genero</label>
                            <select name="genero[]" class="form-control select2 @error('genero') is-invalid @enderror" id="genero">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsGender as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('genero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono[]" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Correo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo[]" value="{{ old('correo') }}">
                            @error('correo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profesion -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="profesion" class="form-label">Profesion</label>
                            <input type="text" class="form-control @error('profesion') is-invalid @enderror" id="profesion" name="profesion[]" value="{{ old('profesion') }}">
                            @error('profesion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Red Social -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="red_social" class="form-label">Red Social</label>
                            <select type="text" class="form-control select2 @error('red_social') is-invalid @enderror" id="red_social" name="red_social[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsSocialN as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('red_social')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">
                        <!-- Usuario Red -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="usuario_red" class="form-label">Usuario Red Social</label>
                            <input type="text" class="form-control @error('usuario_red') is-invalid @enderror" id="usuario_red" name="usuario_red[]" value="{{ old('usuario_red') }}">
                            @error('usuario_red')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tipo de Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="tipo_cargo" class="form-label">Tipo de Cargo</label>
                            <select class="form-control select2 @error('tipo_cargo') is-invalid @enderror"
                                id="tipo_cargo" name="tipo_cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsTypesPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('tipo_cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="cargo" class="form-label">Cargos Administrativos</label>
                            <select class="form-control select2 @error('cargo') is-invalid @enderror"
                                id="cargo" name="cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Buro -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="buro" class="form-label">Buró</label>
                            <select class="form-control select2 @error('buro') is-invalid @enderror" id="buro" name="buro[]">
                                <option value="">Seleccionar</option>
                            </select>
                            @error('buro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Posees cargos de administración público -->
                        <div class="mb-3 col-md-6 align-self-end">
                            <label class="form-label me-3">Posees cargos de administración pública</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio1"
                                value="si" {{ old('cargosAdm') == 'si' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio2"
                                value="no" checked {{ old('cargosAdm') == 'no' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            @error('cargosAdm')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo publico -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none" id="cargo_pub">
                            <label for="cargo_pub" class="form-label">Cargo público</label>
                            <input type="text" class="form-control @error('cargo_pub') is-invalid @enderror" id="" name="cargo_pub[]" value="{{ old('cargo_pub') }}">
                            @error('cargo_pub')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- SEGUNDO MIEMBRO --}}
                    <div class="row p-3 m-0">
                        <div class="col-12">
                            <h5 class="card-title fw-semibold">2. Miembro</h5>
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Cedula -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="cedula" class="form-label">Cedula</label>
                            <input type="text" class="form-control @error('cedula') is-invalid @enderror" id="cedula" name="cedula[]" value="{{ old('cedula') }}">
                            @error('cedula')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="nombre" class="form-label">Nombres</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre[]" value="{{ old('nombre') }}">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="apellido" class="form-label">Apellidos</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido[]" value="{{ old('apellido') }}">
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">

                        <!-- Fecha de nacimiento  -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento[]" value="{{ old('fecha_nacimiento') }}" placeholder="mm/dd/yyyy" autocomplete="off">
                                <span class="input-group-text">
                                  <i class="ti ti-calendar fs-5"></i>
                                </span>
                            </div>
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Genero -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="genero" class="form-label">Genero</label>
                            <select name="genero[]" class="form-control select2 @error('genero') is-invalid @enderror" id="genero">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsGender as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('genero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono[]" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Correo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo[]" value="{{ old('correo') }}">
                            @error('correo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profesion -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="profesion" class="form-label">Profesion</label>
                            <input type="text" class="form-control @error('profesion') is-invalid @enderror" id="profesion" name="profesion[]" value="{{ old('profesion') }}">
                            @error('profesion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Red Social -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="red_social" class="form-label">Red Social</label>
                            <select type="text" class="form-control select2 @error('red_social') is-invalid @enderror" id="red_social" name="red_social[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsSocialN as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('red_social')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">
                        <!-- Usuario Red -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="usuario_red" class="form-label">Usuario Red Social</label>
                            <input type="text" class="form-control @error('usuario_red') is-invalid @enderror" id="usuario_red" name="usuario_red[]" value="{{ old('usuario_red') }}">
                            @error('usuario_red')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tipo de Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="tipo_cargo" class="form-label">Tipo de Cargo</label>
                            <select class="form-control select2 @error('tipo_cargo') is-invalid @enderror"
                                id="tipo_cargo" name="tipo_cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsTypesPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('tipo_cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="cargo" class="form-label">Cargos Administrativos</label>
                            <select class="form-control select2 @error('cargo') is-invalid @enderror"
                                id="cargo" name="cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Buro -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="buro" class="form-label">Buró</label>
                            <select class="form-control select2 @error('buro') is-invalid @enderror" id="buro" name="buro[]">
                                <option value="">Seleccionar</option>
                            </select>
                            @error('buro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Posees cargos de administración público -->
                        <div class="mb-3 col-md-6 align-self-end">
                            <label class="form-label me-3">Posees cargos de administración pública</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio1"
                                value="si" {{ old('cargosAdm') == 'si' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio2"
                                value="no" checked {{ old('cargosAdm') == 'no' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            @error('cargosAdm')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo publico -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none" id="cargo_pub">
                            <label for="cargo_pub" class="form-label">Cargo público</label>
                            <input type="text" class="form-control @error('cargo_pub') is-invalid @enderror" id="" name="cargo_pub[]" value="{{ old('cargo_pub') }}">
                            @error('cargo_pub')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- TERCER MIEMBRO --}}
                    <div class="row p-3 m-0">
                        <div class="col-12">
                            <h5 class="card-title fw-semibold">3. Miembro</h5>
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Cedula -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="cedula" class="form-label">Cedula</label>
                            <input type="text" class="form-control @error('cedula') is-invalid @enderror" id="cedula" name="cedula[]" value="{{ old('cedula') }}">
                            @error('cedula')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="nombre" class="form-label">Nombres</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre[]" value="{{ old('nombre') }}">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="apellido" class="form-label">Apellidos</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido[]" value="{{ old('apellido') }}">
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">

                        <!-- Fecha de nacimiento  -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento[]" value="{{ old('fecha_nacimiento') }}" placeholder="mm/dd/yyyy" autocomplete="off">
                                <span class="input-group-text">
                                  <i class="ti ti-calendar fs-5"></i>
                                </span>
                            </div>
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Genero -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="genero" class="form-label">Genero</label>
                            <select name="genero[]" class="form-control select2 @error('genero') is-invalid @enderror" id="genero">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsGender as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('genero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono[]" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Correo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo[]" value="{{ old('correo') }}">
                            @error('correo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profesion -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="profesion" class="form-label">Profesion</label>
                            <input type="text" class="form-control @error('profesion') is-invalid @enderror" id="profesion" name="profesion[]" value="{{ old('profesion') }}">
                            @error('profesion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Red Social -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="red_social" class="form-label">Red Social</label>
                            <select type="text" class="form-control select2 @error('red_social') is-invalid @enderror" id="red_social" name="red_social[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsSocialN as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('red_social')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">
                        <!-- Usuario Red -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="usuario_red" class="form-label">Usuario Red Social</label>
                            <input type="text" class="form-control @error('usuario_red') is-invalid @enderror" id="usuario_red" name="usuario_red[]" value="{{ old('usuario_red') }}">
                            @error('usuario_red')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tipo de Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="tipo_cargo" class="form-label">Tipo de Cargo</label>
                            <select class="form-control select2 @error('tipo_cargo') is-invalid @enderror"
                                id="tipo_cargo" name="tipo_cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsTypesPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('tipo_cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="cargo" class="form-label">Cargos Administrativos</label>
                            <select class="form-control select2 @error('cargo') is-invalid @enderror"
                                id="cargo" name="cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Buro -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="buro" class="form-label">Buró</label>
                            <select class="form-control select2 @error('buro') is-invalid @enderror" id="buro" name="buro[]">
                                <option value="">Seleccionar</option>
                            </select>
                            @error('buro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Posees cargos de administración público -->
                        <div class="mb-3 col-md-6 align-self-end">
                            <label class="form-label me-3">Posees cargos de administración pública</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio1"
                                value="si" {{ old('cargosAdm') == 'si' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio2"
                                value="no" checked {{ old('cargosAdm') == 'no' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            @error('cargosAdm')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo publico -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none" id="cargo_pub">
                            <label for="cargo_pub" class="form-label">Cargo público</label>
                            <input type="text" class="form-control @error('cargo_pub') is-invalid @enderror" id="" name="cargo_pub[]" value="{{ old('cargo_pub') }}">
                            @error('cargo_pub')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- CUARTO MIEMBRO --}}
                    <div class="row p-3 m-0">
                        <div class="col-12">
                            <h5 class="card-title fw-semibold">4. Miembro</h5>
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Cedula -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="cedula" class="form-label">Cedula</label>
                            <input type="text" class="form-control @error('cedula') is-invalid @enderror" id="cedula" name="cedula[]" value="{{ old('cedula') }}">
                            @error('cedula')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="nombre" class="form-label">Nombres</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre[]" value="{{ old('nombre') }}">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="apellido" class="form-label">Apellidos</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido[]" value="{{ old('apellido') }}">
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">

                        <!-- Fecha de nacimiento  -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento[]" value="{{ old('fecha_nacimiento') }}" placeholder="mm/dd/yyyy" autocomplete="off">
                                <span class="input-group-text">
                                  <i class="ti ti-calendar fs-5"></i>
                                </span>
                            </div>
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Genero -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="genero" class="form-label">Genero</label>
                            <select name="genero[]" class="form-control select2 @error('genero') is-invalid @enderror" id="genero">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsGender as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('genero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono[]" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Correo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo[]" value="{{ old('correo') }}">
                            @error('correo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profesion -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="profesion" class="form-label">Profesion</label>
                            <input type="text" class="form-control @error('profesion') is-invalid @enderror" id="profesion" name="profesion[]" value="{{ old('profesion') }}">
                            @error('profesion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Red Social -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="red_social" class="form-label">Red Social</label>
                            <select type="text" class="form-control select2 @error('red_social') is-invalid @enderror" id="red_social" name="red_social[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsSocialN as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('red_social')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">
                        <!-- Usuario Red -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="usuario_red" class="form-label">Usuario Red Social</label>
                            <input type="text" class="form-control @error('usuario_red') is-invalid @enderror" id="usuario_red" name="usuario_red[]" value="{{ old('usuario_red') }}">
                            @error('usuario_red')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tipo de Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="tipo_cargo" class="form-label">Tipo de Cargo</label>
                            <select class="form-control select2 @error('tipo_cargo') is-invalid @enderror"
                                id="tipo_cargo" name="tipo_cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsTypesPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('tipo_cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="cargo" class="form-label">Cargos Administrativos</label>
                            <select class="form-control select2 @error('cargo') is-invalid @enderror"
                                id="cargo" name="cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Buro -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="buro" class="form-label">Buró</label>
                            <select class="form-control select2 @error('buro') is-invalid @enderror" id="buro" name="buro[]">
                                <option value="">Seleccionar</option>
                            </select>
                            @error('buro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Posees cargos de administración público -->
                        <div class="mb-3 col-md-6 align-self-end">
                            <label class="form-label me-3">Posees cargos de administración pública</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio1"
                                value="si" {{ old('cargosAdm') == 'si' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio2"
                                value="no" checked {{ old('cargosAdm') == 'no' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            @error('cargosAdm')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo publico -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none" id="cargo_pub">
                            <label for="cargo_pub" class="form-label">Cargo público</label>
                            <input type="text" class="form-control @error('cargo_pub') is-invalid @enderror" id="" name="cargo_pub[]" value="{{ old('cargo_pub') }}">
                            @error('cargo_pub')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- QUINTO MIEMBRO --}}
                    <div class="row p-3 m-0">
                        <div class="col-12">
                            <h5 class="card-title fw-semibold">5. Miembro</h5>
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Cedula -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="cedula" class="form-label">Cedula</label>
                            <input type="text" class="form-control @error('cedula') is-invalid @enderror" id="cedula" name="cedula[]" value="{{ old('cedula') }}">
                            @error('cedula')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="nombre" class="form-label">Nombres</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre[]" value="{{ old('nombre') }}">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Apellidos -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="apellido" class="form-label">Apellidos</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido[]" value="{{ old('apellido') }}">
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">

                        <!-- Fecha de nacimiento  -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento[]" value="{{ old('fecha_nacimiento') }}" placeholder="mm/dd/yyyy" autocomplete="off">
                                <span class="input-group-text">
                                  <i class="ti ti-calendar fs-5"></i>
                                </span>
                            </div>
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Genero -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="genero" class="form-label">Genero</label>
                            <select name="genero[]" class="form-control select2 @error('genero') is-invalid @enderror" id="genero">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsGender as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('genero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono[]" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Correo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo[]" value="{{ old('correo') }}">
                            @error('correo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profesion -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="profesion" class="form-label">Profesion</label>
                            <input type="text" class="form-control @error('profesion') is-invalid @enderror" id="profesion" name="profesion[]" value="{{ old('profesion') }}">
                            @error('profesion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Red Social -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="red_social" class="form-label">Red Social</label>
                            <select type="text" class="form-control select2 @error('red_social') is-invalid @enderror" id="red_social" name="red_social[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsSocialN as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('red_social')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 bg-light-subtle m-0">
                        <!-- Usuario Red -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="usuario_red" class="form-label">Usuario Red Social</label>
                            <input type="text" class="form-control @error('usuario_red') is-invalid @enderror" id="usuario_red" name="usuario_red[]" value="{{ old('usuario_red') }}">
                            @error('usuario_red')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tipo de Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4">
                            <label for="tipo_cargo" class="form-label">Tipo de Cargo</label>
                            <select class="form-control select2 @error('tipo_cargo') is-invalid @enderror"
                                id="tipo_cargo" name="tipo_cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsTypesPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('tipo_cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="cargo" class="form-label">Cargos Administrativos</label>
                            <select class="form-control select2 @error('cargo') is-invalid @enderror"
                                id="cargo" name="cargo[]">
                                <option value="">Seleccionar</option>
                                @foreach ($optionsPositions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>";
                                @endforeach
                            </select>
                            @error('cargo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row p-3 m-0">
                        <!-- Buro -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none">
                            <label for="buro" class="form-label">Buró</label>
                            <select class="form-control select2 @error('buro') is-invalid @enderror" id="buro" name="buro[]">
                                <option value="">Seleccionar</option>
                            </select>
                            @error('buro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Posees cargos de administración público -->
                        <div class="mb-3 col-md-6 align-self-end">
                            <label class="form-label me-3">Posees cargos de administración pública</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio1"
                                value="si" {{ old('cargosAdm') == 'si' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input cargoPublicoCheck" type="radio" name="cargosAdm[]" id="inlineRadio2"
                                value="no" checked {{ old('cargosAdm') == 'no' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            @error('cargosAdm')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cargo publico -->
                        <div class="mb-3 col-md-6 col-lg-4 d-none" id="cargo_pub">
                            <label for="cargo_pub" class="form-label">Cargo público</label>
                            <input type="text" class="form-control @error('cargo_pub') is-invalid @enderror" id="" name="cargo_pub[]" value="{{ old('cargo_pub') }}">
                            @error('cargo_pub')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 align-self-end">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
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
    <script>
        window.urlFetchScopeData = "{{ route('members.getScopeInfo')}}";
        window.opcionesBuro = @json($optionsBuro);
        window.opcionesBuroSecFemenina = @json($optionsBuroSecFemenina);
        window.opcionesBuroSecCultura = @json($optionsBuroSecCultura);
    </script>
    <script src="{{ asset('assets/libs/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/forms/select2.init.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/forms/datepicker-init.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/members/members-register.js') }}"></script> --}}
@endsection
