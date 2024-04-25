@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Registrar Usuario</h5>
                <form class="row" method="POST" action="{{ route('users.storeU') }}">
                    @csrf
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="correo" id="" value="{{ old('correo') }}" required>
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
