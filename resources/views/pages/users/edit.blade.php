@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Actualizar Usuario</h5>
                <form class="row" method="POST" action="{{ route('users.update', $users) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 col-md-6 col-lg-4">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="correo" id="" value="{{ $users->email }}" required>
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
