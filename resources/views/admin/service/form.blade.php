<x-modal data-backdrop="static" data-keyboard="false" size="modal-xl">
    <x-slot name="title">
        Tambah
    </x-slot>

    @method('POST')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label for="title">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" id="title" autocomplete="off"
                    placeholder="Masukan judul" required>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label for="icon">Icon <span class="text-danger">*</span></label>
                <input type="text" name="icon" class="form-control" id="icon" autocomplete="off"
                    placeholder="example : fas fa-dashboard" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="form-group">
                <label for="description">Konten</label>
                <textarea name="description" id="description" rows="3" class="form-control summernote"></textarea>
            </div>
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
