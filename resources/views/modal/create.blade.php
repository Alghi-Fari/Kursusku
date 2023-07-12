{{-- Create Kursus --}}
<div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Buat Kursus Baru') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <form action="{{ route('kursus.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                
                    <div class="mb-3">
                        <label class="form-label">Judul Kursus</label>
                        <input type="text" class="form-control" name="judul">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Durasi</label>
                        <input type="text" class="form-control" name="durasi">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
</div>
{{-- Create Kursus End --}}