@extends('layouts.main')
@section('content')
<div class="mt-4 row content-wrapper justify-content-center">
    <div class="col-md-8 col-sm-8 ">
        <div class="card-box mb-30 shadow">
            <div class="pd-20 border border-success rounded-2">
                {{-- Detail Kursus Start --}}
                
                <form action="{{ route('kursus.update', $course->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" name="id" id="" value="{{ $course->id }}" hidden>
                    <div class="form-group mb-3 row">
                        <div class="col-12 ms-5">
                            <div class="input-group mt-4">
                                <h1 class="text-bold">{{$course->judul}}</h1>
                            </div>
                            <p>{{$course->created_at}}</p>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-lg-6 col-md-6 col-sm-12 space-bottom">
                            <div class="row ms-5">
                                <label class="col-12  col-form-label">Deskripsi</label>
                                <div class="col-12">
                                    <p>{{$course->deskripsi}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <label class="col-1  col-form-label"></label>
                                <label class="col-11  col-form-label">Durasi</label>
                                <label class="col-1  col-form-label">
                                    <h6>/</h6>
                                </label>
                                <div class="col-11">
                                    <p>{{$course->durasi}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </form>
                {{-- Detail Kursus End --}}

                {{-- Menambahkan Materi --}}
                @if ($course->materials != "[]")
                <a href="#" data-toggle="modal" data-target="#ModalCreateMateri"><button type="button" class="btn btn-success ms-5">Tambah Materi <i class="fa-solid fa-circle-plus"></i></button></a>
                <div class="card-box mb-30 shadow">
                @else
                    
                @endif
                    <div class="pd-20">
                        @if ($course->materials != "[]")
                            <table id="datatable" class="table border-bottom mt-3">
                                <tbody>

                                    @foreach ($course->materials as $m)
                                        <tr>
                                            <td scope="col" width="10%">
                                                <img src="{{ asset('image/icon2.png') }}" alt="Icon Diamond" width="50px" height="50px"/>
                                            </td>
                                            <td>
                                                <h3 class="text-bold">{{$m->judul}}</h3>
                                                <br>
                                                <p>{{$m->deskripsi}}</p>
                                                <a href="{{$m->link}}">{{$m->link}}</a>
                                                <p>{{$m->created_at}}</p>
                                            </td>

                                            {{-- Digunakan untuk menampilkan Button icon serta mearahkan ke fungsinya --}}
                                            <td scope="col" width="10%">
                                                <a class="btn btn-outline-warning btn-sm mx-2 bg-warning"
                                                    href="{{ route('edit_materi', $m->id) }}"><i
                                                        class="fa-solid fa-pencil text-white"></i></a>
                                                
                                                {{-- <a href="#" data-toggle="modal" data-target="#ModalDelete"><button type="button" class="btn btn-outline-success">Hapus</button></a> --}}
                                                <br><br>
                                                <a class=" btn btn-outline-danger btn-sm mx-2 bg-danger" id='deleteModalBtn'
                                                    data-url='{{ route('delete_materi', $m->id) }}' data-toggle='modal'
                                                    data-id='{{ $m->id }}' data-target='#deleteModal_{{ $m->id }}'
                                                    style='cursor: pointer;' onClick='handleDelete(this)'><i class="fa-regular fa-trash-can text-white"></i></i></a>
                                            </td>
                                        </tr>
                                        {{-- Delete Modal Start --}}
                                        <div class='modal fade' id='deleteModal_{{$m->id}}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
                                        aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalLabel'>Delete</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('delete_materi', $m->id)}}" method='GET' id="formDelete">
                                                    @csrf
                                                    <div class='modal-body'>
                                                        Are you sure to delete this item?
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                        <button type='submit' class='btn btn-danger'>Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                        <tr style="height: 10px;"></tr>
                                        {{-- Delete Modal End --}}
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{asset('image/icon.png')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="#" data-toggle="modal" data-target="#ModalCreateMateri"><button type="button" class="btn btn-outline-success">Sepertinya Anda belum punya Materi, Ayo buat satu!!</button></a>
                                    </div>
                                </div>
                                
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Materi End --}}

            </div>
        </div>
    </div>
</div>



{{-- Delete Modal Script Start --}}
<script>
    function handleDelete(target) {
        let formDelete = document.querySelector("#formDelete");
        let deleteModal = document.querySelector("#deleteModal");
        const deleteModalBtn = document.querySelectorAll("#deleteModalBtn");

        deleteModalBtn.forEach((data) => {
            data.addEventListener("click", function(e) {
                deleteModal.setAttribute("id", `deleteModal_${data.dataset.id}`);
                formDelete.setAttribute("action", data.dataset.url);
            });
        });
    }
</script>

{{-- Create Materi --}}
<div class="modal fade text-left" id="ModalCreateMateri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Tambahkan Materi Baru') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>                    
            </div>
            <form action="{{route('store_materi')}}" method="POST">
            @isset($course->id)
                <input type="hidden" value="{{$course->id}}" name="id_course">
            @endisset
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Judul Materi</label>
                    <input type="text" class="form-control" name="judul">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Embed Link</label>
                    <input type="url" class="form-control" name="link">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
{{-- Create Materi End --}}
{{-- Delete Modal Script End --}}
{{-- @include('modal.create',['id_course' => $course->id]) --}}
@endsection