@extends('layouts.main')
@section('content')
    <div class="row content-wrapper justify-content-center">
        <div class="col-md-8 col-sm-8 mb-20">
            @if ($course != "[]")
            <a href="#" data-toggle="modal" data-target="#ModalCreate"><button type="button" class="btn btn-success mt-3">Tambah Kursus <i class="fa-solid fa-circle-plus"></i></button></a>
            <div class="card-box mb-30 shadow">
            @else
                
            @endif
                <div class="pd-20">
                    @if ($course != "[]")
                        <table id="datatable" class="table border-bottom mt-3">
                            <tbody>
                                @foreach ($course as $c)
                                    <tr>
                                        <td scope="col" width="15%">
                                            <img src="{{ asset('image/icon2.png') }}" alt="Icon Diamond" width="50px" height="50px"/>
                                        </td>
                                        <td>
                                            <h3 class="text-bold">{{$c->judul}}</h3>
                                            <br>
                                            <p>{{$c->deskripsi}}</p>
                                            <p>Durasi : {{$c->durasi}}</p>
                                            <p>{{ $c->created_at }}</p>
                                        </td>

                                        {{-- Digunakan untuk menampilkan Button icon serta mearahkan ke fungsinya --}}
                                        <td scope="col" width="10%">
                                            <a class="btn btn-outline-success btn-sm mx-2 bg-success" href="{{route('kursus.show', $c->id)}}"><i class="fa-solid fa-magnifying-glass-chart"></i></a>
                                            {{-- <a href="#" data-toggle="modal" data-target="#ModalDelete"><button type="button" class="btn btn-outline-success">Hapus</button></a> --}}
                                            <br><br>
                                            <a class="btn btn-outline-warning btn-sm mx-2 bg-warning"
                                                href="{{ route('kursus.edit', $c->id) }}"><i
                                                    class="fa-solid fa-pencil text-white"></i></a>
                                            <br><br>                            
                                            <a class=" btn btn-outline-danger btn-sm mx-2 bg-danger" id='deleteModalBtn'
                                                data-url='{{ route('kursus.destroy', $c->id) }}' data-toggle='modal'
                                                data-id='{{ $c->id }}' data-target='#deleteModal_{{ $c->id }}'
                                                style='cursor: pointer;' onClick='handleDelete(this)'><i class="fa-regular fa-trash-can text-white"></i></i></a>
                                        </td>
                                    </tr>
                                    <tr style="height: 20px;"></tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="content-wrapper d-flex justify-content-center align-items-center">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('image/icon.png')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a href="#" data-toggle="modal" data-target="#ModalCreate"><button type="button" class="btn btn-outline-success">Sepertinya Anda belum punya kursus, Ayo buat satu!!</button></a>
                                </div>
                            </div>
                            
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    {{-- Delete Modal Start --}}
    <div class='modal fade' id='deleteModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
        aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <form action="" method='POST' id="formDelete">
                    @method('DELETE')
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
    {{-- Delete Modal End --}}

    {{-- Edit Modal Start --}}
    {{-- <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit Kursus') }}</h4>
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
    </div> --}}
    {{-- Edit Modal End --}}

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
    {{-- Delete Modal Script End --}}

    {{-- Update Modal Script Start --}}
    {{-- <script>
        $TES(document).ready(function(){
            var table = $('#datatable').Datatable();

            table.on('click', '.edit',function(){
                $tr = $(this).closest('tr');
                if ($(tr).hasClass('child')){
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#judul').val(data[1]);
                $('#deskripsi').val(data[2]);
                $('#durasi').val(data[3]);

                $('#editForm').attr('action','kursus.'+data[0]);
                $('#editModal').modal('show');
            });
        });
    </script> --}}
    {{-- Update Modal Script End --}}

    @if(Session::has('success'))
    <script>
        swal("Success","Data Tersimpan","success",{
            button:"OK"
        });
    </script>
    @endif

    @include('modal.create')
@endsection