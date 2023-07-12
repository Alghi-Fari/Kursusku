{{-- Edit Kursus --}}
<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Buat Kursus Baru') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>                    
            </div>
            <form action="{{ route('course') }}" method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-body">
            
                <div class="mb-3">
                    <label class="form-label">Judul Kursus</label>
                    <input type="text" class="form-control" name="judul" id="judul">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Durasi</label>
                    <input type="text" class="form-control" name="durasi" id="durasi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
{{-- End Edit Kursus --}}

{{-- Edit Materi --}}
<div class="modal fade text-left" id="ModalCreateLink" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Tambahkan Materi Baru') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>                    
            </div>
            <form action="{{ route('material.store') }}" method="POST">
            @csrf
            <div class="modal-body">
            
                <div class="mb-3">
                    <label class="form-label">Judul Materi</label>
                    <input type="text" class="form-control" name="judul_link">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi_link">
                </div>
                <div class="mb-3">
                    <label class="form-label">Embed Link</label>
                    <input type="url" class="form-control" name="link">
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
{{-- End Edit Materi --}}

<script>
    $(document).ready(function(){
        var table = $('#datatable').Datatable();
    });
</script>