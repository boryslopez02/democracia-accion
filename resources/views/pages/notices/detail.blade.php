@extends('layouts.app')

@section('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4" bis_skin_checked="1">
            <div class="card-body px-4 py-3" bis_skin_checked="1">
                <div class="row align-items-center" bis_skin_checked="1">
                    <div class="col-9" bis_skin_checked="1">
                        <h4 class="fw-semibold mb-8">Noticia Detalle</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Noticia Detalle</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3" bis_skin_checked="1">
                        <div class="text-center mb-n5" bis_skin_checked="1">
                            <img src="{{ asset('assets/images/notices/ChatBc.png') }}" alt=""
                                class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-2 overflow-hidden" bis_skin_checked="1">
            <div class="position-relative" bis_skin_checked="1">
                <a href="javascript:void(0)">
                    <img src="{{ asset($notices->noticeFiles[0]->file_path) }}" class="card-img-top rounded-0 object-fit-cover" alt="..." height="440">
                </a>
                <span
                    class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                    min Read</span>
                <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt=""
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Esther Lindsey">
            </div>
            <div class="card-body p-4" bis_skin_checked="1">
                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Lifestyle</span>
                <h2 class="fs-9 fw-semibold my-4">{{ $notices->title}}</h2>
                <div class="d-flex align-items-center gap-4" bis_skin_checked="1">
                    <div class="d-flex align-items-center gap-2" bis_skin_checked="1"><i
                            class="ti ti-eye text-dark fs-5"></i>2252</div>
                    <div class="d-flex align-items-center gap-2" bis_skin_checked="1"><i
                            class="ti ti-message-2 text-dark fs-5"></i>3</div>
                    <div class="d-flex align-items-center fs-2 ms-auto" bis_skin_checked="1"><i
                            class="ti ti-point text-dark"></i>{{ $notices->created_at->format('D, M j') }}
                    </div>
                </div>
            </div>
            <div class="card-body border-top p-4" bis_skin_checked="1">
                <div id="editor-container" class="editor-container only-read">{!! $notices->content !!}</div>
            </div>
        </div>

        @if($previousNotice)
            <a href="{{ route('notices.detail', $previousNotice->id) }}">Noticia anterior</a>
        @endif

        @if($nextNotice)
            <a href="{{ route('notices.detail', $nextNotice->id) }}">Noticia siguiente</a>
        @endif

    </div>
@endsection

@section('page-scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    let quill = new Quill('#editor-container', {
        theme: 'snow',
        readOnly: true,
        modules: {
            toolbar: false
        }
    });

    let contentInput = document.querySelector('input[name=content]');

    quill.on('text-change', function() {
        let html = quill.root.innerHTML;
        contentInput.value = html;
    });

</script>
@endsection