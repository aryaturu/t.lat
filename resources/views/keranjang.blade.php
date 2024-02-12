@extends('index')
@section('konten')

<div class="mt-5"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahKeranjang"> + Tambah Keranjang Baru</button></div>

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">CartID</th>
        <th scope="col">ProdukID</th>
        <th scope="col">UserID</th>
        <th scope="col">Total Harga</th>
        <th scope="col">Jumlah Produk</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>

@foreach ($keranjang as $p)


      <tr>
        <td>{{$p->cartID}}</td>
        <td>{{$p->produkID}}</td>
        <td>{{$p->userID}}</td>
        <td>{{$p->totalharga}}</td>
        <td>{{$p->jumlahproduk}}</td>
        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalUpdateKeranjang{{ $p->cartID }}">Update</button> |
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDeleteKeranjang{{ $p->cartID }}">Delete</button></td>
      </tr>
    </tbody>

    <!-- Ini tampil form update user -->
    <div class="modal fade" id="ModalUpdateKeranjang{{ $p->cartID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Keranjang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/keranjang/storeupdate" method="post" class="form-floating">
                        @csrf
                        <input type="hidden" name="cartID" class="form-control" value="{{ $p->cartID }}">
                        <div class="form-floating p-1">
                            <input type="text" name="cartID" required="required" class="form-control" value="{{ $p->cartID }}">
                            <label for="floatingInputValue">Cart ID</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="produkID" required="required" class="form-control" value="{{ $p->produkID }}">
                            <label for="floatingInputValue">Produk ID</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="userID" name="userID" required="required" class="form-control" value="{{ $p->userID }}">
                            <label for="floatingInputValue">User ID</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="totalharga" name="totalharga" required="required" class="form-control" value="{{ $p->totalharga }}">
                            <label for="floatingInputValue">Total Harga (Rp.)</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="jumlahproduk" name="jumlahproduk" required="required" class="form-control" value="{{ $p->jumlahproduk }}">
                            <label for="floatingInputValue">jumlahproduk</label>
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
    <div class="modal fade" id="ModalDeleteKeranjang{{$p->cartID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Keranjang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/keranjang/delete/{{$p->cartID}}" method="get" class="form-floating">
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
<div class="modal fade" id="ModalTambahKeranjang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Keranjang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/keranjang/storeinput" method="post" class="form-floating">
                    @csrf
                    <div class="form-floating p-1">
                        <input type="text" name="cartID" required="required" class="form-control">
                        <label for="floatingInputValue">Cart ID</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="produkID" required="required" class="form-control">
                        <label for="floatingInputValue">Produk ID </label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="userID" name="userID" required="required" class="form-control">
                        <label for="floatingInputValue">User ID</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="totalharga" name="totalharga" required="required" class="form-control">
                        <label for="floatingInputValue">Total Harga</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="jumlahproduk" name="jumlahproduk" required="required" class="form-control">
                        <label for="floatingInputValue">Jumlah Produk</label>
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