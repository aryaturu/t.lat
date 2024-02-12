@extends('index')
@section('konten')

<div class="mt-5"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUserorder"> + Tambah User Order Baru</button></div>

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">OrdeID</th>
        <th scope="col">Produk ID</th>
        <th scope="col">User ID</th>>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>

@foreach ($userorder as $p)


      <tr>
        <td>{{$p->orderID}}</td>
        <td>{{$p->produkID}}</td>
        <td>{{$p->userID}}</td>
        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalUpdateUserorder{{ $p->orderID }}">Update</button> |
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDeleteUserorder{{ $p->orderID }}">Delete</button></td>
      </tr>
    </tbody>

    <!-- Ini tampil form update user -->
    <div class="modal fade" id="ModalUpdateUserorder{{ $p->orderID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update User Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/userorder/storeupdate" method="post" class="form-floating">
                        @csrf
                        <input type="hidden" name="orderID" class="form-control" value="{{ $p->orderID }}">
                        <div class="form-floating p-1">
                            <input type="text" name="orderID" required="required" class="form-control" value="{{ $p->orderID }}">
                            <label for="floatingInputValue">Order ID</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="produkID" required="required" class="form-control" value="{{ $p->produkID }}">
                            <label for="floatingInputValue">Produk ID</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="userID" name="userID" required="required" class="form-control" value="{{ $p->userID }}">
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
    <div class="modal fade" id="ModalDeleteUserorder{{$p->orderID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/userorder/delete/{{$p->orderID}}" method="get" class="form-floating">
                        @csrf
                        <div>
                            <h3>Yakin mau menghapus data <b>{{$p->produkID}}</b> ?</h3>
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
<div class="modal fade" id="ModalTambahUserorder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/userorder/storeinput" method="post" class="form-floating">
                    @csrf
                    <div class="form-floating p-1">
                        <input type="text" name="orderID" required="required" class="form-control">
                        <label for="floatingInputValue">kategori ID</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="produkID" required="required" class="form-control">
                        <label for="floatingInputValue">Produk ID</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="userID" name="userID" required="required" class="form-control">
                        <label for="floatingInputValue">User ID</label>
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