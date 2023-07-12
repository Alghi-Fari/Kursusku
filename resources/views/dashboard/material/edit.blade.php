@extends('layouts.main')
@section('content')
<div class="mt-4 row content-wrapper justify-content-center">
    <div class="col-md-8 col-sm-8 ">
        <div class="card-box mb-30 shadow">
            <div class="pd-20 border border-success rounded-2">
                <form action="{{ route('update_materi', $material->id) }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$material->id_course}}" name="id_course">
                    <input type="text" name="id" value="{{ $material->id }}" hidden>
                    <div class="form-group mb-3 row ms-4 me-4 pt-3">
                        <label class="col-12  col-form-label"> Judul <span class="text-danger">*</span></label>
                        <div class="col-12 ">
                            <div class="input-group mb-0">
                                <input type="text" class="form-control number-input" name="judul"
                                    placeholder="https://example.com/my-long-url" required
                                    value="{{ $material->judul }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3 row ms-4 me-4">
                        <div class="col-lg-6 col-md-6 col-sm-12 space-bottom">
                            <div class="row">
                                <label class="col-12  col-form-label">Deskripsi</label>
                                <div class="col-12">
                                    <div class="input-group mb-0">
                                        <input type="text" class="form-control" name="deskripsi"
                                            value="{{$material->deskripsi}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <label class="col-1  col-form-label"></label>
                                <label class="col-11  col-form-label">Durasi</label>
                                <label class="col-1  col-form-label"></label>
                                <div class="col-11">
                                    <input type="text" class="form-control" name="link" 
                                        value="{{ $material->link }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row me-4 pb-3">
                        <div class="col-12 mt-2 d-flex justify-content-end">
                            <button class="btn btn-success" type="submit">
                                Update It! <i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection