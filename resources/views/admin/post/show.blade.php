@extends('layouts.app')

@section('title', 'Post')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@push('css')
    <style>
        .daftar-donasi.nav-pills .nav-link.active,
        .daftar-donasi.nav-pills .show>.nav-link {
            background: transparent;
            color: var(--dark);
            border-bottom: 3px solid var(--blue);
            border-radius: 0;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <x-card>
                <x-slot name="header">
                    <h3>{{ $post->post_title }}</h3>
                    <p class="font-weight-bold mb-0">
                        Diposting oleh <span class="text-primary">{{ $post->user->name }}</span>
                        <small class="d-block">{{ tanggal_indonesia($post->created_at) }}
                            {{ date('H:i', strtotime($post->created_at)) }}</small>
                    </p>
                </x-slot>

                {!! $post->body !!}

            </x-card>
        </div>
        <div class="col-lg-4">
            <x-card>
                <x-slot name="header">
                    <h5 class="card-title">Kategori</h5>
                </x-slot>

                <ul>
                    @foreach ($post->category_post as $item)
                        <li>{{ $item->category_name }}</li>
                    @endforeach
                </ul>
            </x-card>

            <x-card>
                <x-slot name="header">
                    <h5 class="card-title">Gambar Unggulan</h5>
                </x-slot>

                <img src="{{ Storage::url($post->path_image) }}" class="img-thumbnail">
            </x-card>
        </div>
    </div>

    {{--  <x-modal size="modal-md">
        <x-slot name="title">
            Konfirmasi
        </x-slot>

        @method('put')

        <input type="hidden" name="status" value="publish">

        <div class="alert mt-3">
            <i class="fas fa-info-circle mr-1"></i> <span class="text-message"></span>
        </div>

        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" onclick="submitForm(this.form)">Simpan</button>
        </x-slot>
    </x-modal>  --}}
@endsection

@push('scripts')
    <script>
        let modal = '#modal-form';

        function editForm(url, status, message, color) {
            $(modal).modal('show');
            $(`${modal} form`).attr('action', url);

            $(`${modal} [name=status]`).val(status);
            $(`${modal} .text-message`).text(message);
            $(`${modal} .alert`).removeClass('alert-success alert-danger').addClass(`alert-${color}`)
        }

        function submitForm(originalForm) {
            $.post({
                    url: $(originalForm).attr('action'),
                    data: new FormData(originalForm),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false
                })
                .done(response => {
                    $(modal).modal('hide');
                    showAlert(response.message, 'success');
                    $('.card-footer').remove();
                })
                .fail(errors => {
                    if (errors.status == 422) {
                        loopErrors(errors.responseJSON.errors);
                        return;
                    }

                    showAlert(errors.responseJSON.message, 'danger');
                });
        }
    </script>
@endpush
