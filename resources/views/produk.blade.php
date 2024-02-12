@extends('index')
@section('konten')

<div class="mt-5"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahProduk"> + Tambah Produk Baru</button></div>

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">ProdukID</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Deskripsi Produk</th>
        <th scope="col">Harga</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>

@foreach ($produk as $p)


      <tr>
        <td>{{$p->produkID}}</td>
        <td>{{$p->namaproduk}}</td>
        <td>{{$p->deskripsiproduk}}</td>
        <td>{{$p->harga}}</td>
        <td>{{$p->jumlah}}</td>
        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalUpdateProduk{{ $p->produkID }}">Update</button> |
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDeleteProduk{{ $p->produkID }}">Delete</button></td>
      </tr>
    </tbody>

    <!-- Ini tampil form update user -->
    <div class="modal fade" id="ModalUpdateProduk{{ $p->produkID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/produk/storeupdate" method="post" class="form-floating">
                        @csrf
                        <input type="hidden" name="produkID" class="form-control" value="{{ $p->produkID }}">
                        <div class="form-floating p-1">
                            <input type="text" name="produkID" required="required" class="form-control" value="{{ $p->produkID }}">
                            <label for="floatingInputValue">Produk ID</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="namaproduk" required="required" class="form-control" value="{{ $p->namaproduk }}">
                            <label for="floatingInputValue">Nama Produk</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="deskripsiProduk" name="deskripsiproduk" required="required" class="form-control" value="{{ $p->deskripsiproduk }}">
                            <label for="floatingInputValue">Deskripsi Produk</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="harga" name="harga" required="required" class="form-control" value="{{ $p->harga }}">
                            <label for="floatingInputValue">Harga (Rp.)</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="jumlah" name="jumlah" required="required" class="form-control" value="{{ $p->jumlah }}">
                            <label for="floatingInputValue">Jumlah</label>
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
    <div class="modal fade" id="ModalDeleteProduk{{$p->produkID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/produk/delete/{{$p->produkID}}" method="get" class="form-floating">
                        @csrf
                        <div>
                            <h3>Yakin mau menghapus data <b>{{$p->namaproduk}}</b> ?</h3>
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
<div class="modal fade" id="ModalTambahProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/produk/storeinput" method="post" class="form-floating">
                    @csrf
                    <div class="form-floating p-1">
                        <input type="text" name="produkID" required="required" class="form-control">
                        <label for="floatingInputValue">Produk ID</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="namaproduk" required="required" class="form-control">
                        <label for="floatingInputValue">Nama Produk</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="deskripsiproduk" name="deskripsiproduk" required="required" class="form-control">
                        <label for="floatingInputValue">Deskripsi Produk</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="harga" name="harga" required="required" class="form-control">
                        <label for="floatingInputValue">Harga</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="jumlah" name="jumlah" required="required" class="form-control">
                        <label for="floatingInputValue">Jumlah</label>
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