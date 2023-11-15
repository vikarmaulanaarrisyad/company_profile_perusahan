<x-modal data-backdrop="static" data-keyboard="false" size="modal-xl">
    <x-slot name="title">
        Tambah
    </x-slot>

    @method('POST')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label for="post_title">Judul <span class="text-danger">*</span></label>
                <input type="text" name="post_title" class="form-control" id="post_title" autocomplete="off"
                    placeholder="Masukan judul" required>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label for="categories">Kategori <span class="text-danger">*</span></label>
                <select name="categories[]" id="categories" class="select2" multiple></select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="form-group">
                <label for="body">Konten</label>
                <textarea name="body" id="body" rows="3" class="form-control summernote"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-6 col-sm-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="custom-select">
                    <option disabled selected>Pilih salah satu</option>
                    <option value="publish">Publish</option>
                    <option value="archived">Diarsipkan</option>
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="path_image">Gambar</label>
                <div class="custom-file">
                    <input type="file" name="path_image" class="custom-file-input" id="path_image"
                        onchange="preview('.preview-path_image', this.files[0])">
                    <label class="custom-file-label" for="path_image">Choose file</label>
                </div>
            </div>

            <img src="" class="img-thumbnail preview-path_image" style="display: none;">
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" onclick="submitForm(this.form)" class="btn btn-sm btn-outline-primary" id="submitBtn">
            <span id="spinner-border" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <i class="fas fa-save mr-1"></i>
            Simpan</button>
        <button type="button" data-dismiss="modal" class="btn btn-sm btn-outline-danger">
            <i class="fas fa-times"></i>
            Close
        </button>
    </x-slot>
</x-modal>
