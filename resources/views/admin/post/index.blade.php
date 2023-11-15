@extends('layouts.app')

@section('title', 'Postingan')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <x-card>
                <x-slot name="header">
                    <button onclick="addData(`{{ route('post.store') }}`)" class="btn btn-primary btn-sm"><i
                            class="fas fa-plus-circle"></i> Tambah Data</button>
                </x-slot>

                <div class="d-flex justify-content-between mb-4">
                    <div class="form-group">
                        <label for="status2">Status</label>
                        <select name="status2" id="status2" class="custom-select">
                            <option value="" selected>Semua</option>
                            <option value="publish" {{ request('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                </div>

                <x-table class="post">
                    <x-slot name="thead">
                        <th>No</th>
                        <th width="20%"></th>
                        <th>Judul</th>
                        <th>Body</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>Aksi</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
    @include('admin.post.form')
@endsection

@include('layouts.includes.datatables')
@include('layouts.includes.select2')
@include('layouts.includes.summernote')

@push('scripts')
    <script>
        let table;
        let modal = '#modal-form';
        let button = '#submitBtn';

        $(function() {
            $('#spinner-border').hide();
        });
    </script>

    <script>
        table = $('.post').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            order: [],
            language: {
                "processing": "Mohon bersabar..."
            },
            ajax: {
                url: '{{ route('post.data') }}',
                data: function(d) {
                    d.status = $('[name=status2]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'path_image',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'post_title',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'body',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'status',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'author',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'aksi',
                    sortable: false,
                    searchable: false
                },
            ]
        });
    </script>

    <script>
        function addData(url, title = 'Tambah Kategori') {
            $(modal).modal('show');
            $(`${modal} .modal-title`).text(title);
            $(`${modal} form`).attr('action', url);
            $(`${modal} [name=_method]`).val('POST');
            $('#spinner-border').hide();
            $(button).show();
            $(button).prop('disabled', false);
            resetForm(`${modal} form`);
        }

        function editData(url, title = "Edit Kategori") {
            $.get(url)
                .done(response => {
                    $(modal).modal('show');
                    $(`${modal} .modal-title`).text(title);
                    $(`${modal} form`).attr('action', url);
                    $(`${modal} [name=_method]`).val('PUT');
                    $('#spinner-border').hide();
                    $(button).prop('disabled', false);
                    resetForm(`${modal} form`);
                    loopForm(response.data);

                    response.data.categories.forEach(function(category) {
                        var option = new Option(category.category_name, category.id, true, true);
                        $('#categories').append(option).trigger('change');
                    });
                })
                .fail(errors => {
                    Swall.fire({
                        icon: 'error',
                        title: 'Opps! Gagal',
                        text: errors.responseJSON.message,
                        showConfirmButton: true,
                    }).then(() => {
                        $('#spinner-border').hide();
                        $(button).prop('disabled', false);
                    });
                });
        }

        function submitForm(originalForm) {
            $(button).prop('disabled', true);
            $('#spinner-border').show();

            $.post({
                    url: $(originalForm).attr('action'),
                    data: new FormData(originalForm),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false
                })
                .done(response => {
                    $(modal).modal('hide');
                    if (response.status = 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 3000
                        }).then(() => {
                            $(button).prop('disabled', false);
                            $('#spinner-border').hide();

                            table.ajax.reload();
                        })
                    }
                })
                .fail(errors => {
                    $('#spinner-border').hide();
                    $(button).prop('disabled', false);
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps! Gagal',
                        text: errors.responseJSON.message,
                        showConfirmButton: true,
                    });
                    if (errors.status == 422) {
                        $('#spinner-border').hide()
                        $(button).prop('disabled', false);
                        loopErrors(errors.responseJSON.errors);
                        return;
                    }
                });
        }

        function deleteData(url, name) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true,
            })
            swalWithBootstrapButtons.fire({
                title: 'Apakah anda yakin?',
                text: 'Anda akan menghapus ' + name + ' ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Iya !',
                cancelButtonText: 'Batalkan',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: url,
                        dataType: "json",
                        success: function(response) {
                            if (response.status = 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(() => {
                                    table.ajax.reload();
                                })
                            }
                        },
                        error: function(xhr, status, error) {
                            // Menampilkan pesan error
                            Swal.fire({
                                icon: 'error',
                                title: 'Opps! Gagal',
                                text: xhr.responseJSON.message,
                                showConfirmButton: true,
                            }).then(() => {
                                // Refresh tabel atau lakukan operasi lain yang diperlukan
                                table.ajax.reload();
                            });
                        }
                    });
                }
            });
        }
    </script>

    <script>
        //Initialize Select2 Elements
        $('#categories').select2({
            placeholder: 'Pilih kategori',
            theme: 'bootstrap4',
            closeOnSelect: true,
            allowClear: true,
            ajax: {
                url: '{{ route('category.search') }}',
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.category_name
                            }
                        })
                    }
                }
            }
        })
    </script>

    <script>
        $('[name=status2]').on('change', function() {
            table.ajax.reload();
        });
    </script>
@endpush
