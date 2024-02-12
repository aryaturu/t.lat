@extends('index')
@section('konten')

<div class="mt-5"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahKategori"> + Tambah kategori Baru</button></div>

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">kategoriID</th>
        <th scope="col">Nama kategori</th>
        <th scope="col">Deskripsi kategori</th>>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>

@foreach ($kategori as $p)


      <tr>
        <td>{{$p->kategoriID}}</td>
        <td>{{$p->namakategori}}</td>
        <td>{{$p->deskripsikategori}}</td>
        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalUpdateKategori{{ $p->kategoriID }}">Update</button> |
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDeleteKategori{{ $p->kategoriID }}">Delete</button></td>
      </tr>
    </tbody>

    <!-- Ini tampil form update user -->
    <div class="modal fade" id="ModalUpdateKategori{{ $p->kategoriID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/kategori/storeupdate" method="post" class="form-floating">
                        @csrf
                        <input type="hidden" name="kategoriID" class="form-control" value="{{ $p->kategoriID }}">
                        <div class="form-floating p-1">
                            <input type="text" name="kategoriID" required="required" class="form-control" value="{{ $p->kategoriID }}">
                            <label for="floatingInputValue">kategori ID</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="namakategori" required="required" class="form-control" value="{{ $p->namakategori }}">
                            <label for="floatingInputValue">Nama kategori</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="deskripsikategori" name="deskripsikategori" required="required" class="form-control" value="{{ $p->deskripsikategori }}">
                            <label for="floatingInputValue">Deskripsi kategori</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Updates</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ini tampil form delete user -->
    <div class="modal fade" id="ModalDeleteKategori{{$p->kategoriID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/kategori/delete/{{$p->kategoriID}}" method="get" class="form-floating">
                        @csrf
                        <div>
                            <h3>Yakin mau menghapus data <b>{{$p->namakategori}}</b> ?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
  </table>



<!-- Ini tampil form tambah user -->
<div class="modal fade" id="ModalTambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/kategori/storeinput" method="post" class="form-floating">
                    @csrf
                    <div class="form-floating p-1">
                        <input type="text" name="kategoriID" required="required" class="form-control">
                        <label for="floatingInputValue">kategori ID</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="namakategori" required="required" class="form-control">
                        <label for="floatingInputValue">Nama kategori</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="deskripsikategori" name="deskripsikategori" required="required" class="form-control">
                        <label for="floatingInputValue">Deskripsi kategori</label>
                    </div>
                    </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection