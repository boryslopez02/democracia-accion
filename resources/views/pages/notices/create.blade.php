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
            <div class="card-body position-relative">
                <h5 class="card-title fw-semibold mb-4"> @if($notices) Editar noticia @else Crear noticia @endif</h5>
                <form class="row" method="POST" @if($notices) action="{{ route('notices.update', $notices) }}" @else action="{{ route('notices.store') }}" @endif  enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 col-md-6">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $notices->title ?? old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ $notices->link ?? old('link') }}">
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="content" class="form-label">Contenido</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ $notices->content ?? old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="media_path" class="form-label">Archivo</label>
                        <input type="file" class="form-control @error('media_path') is-invalid @enderror" id="media_path" name="media_path">
                        @error('media_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 align-self-end">
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>

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
    <!-- <script src="{{ asset('assets/js/pages/members/members-register.js') }}"></script> -->
@endsection
