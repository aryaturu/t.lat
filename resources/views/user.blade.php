@extends('index')
@section('konten')

<div class="mt-5"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> + Tambah User Baru</button></div>

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">userID</th>
        <th scope="col">Nama</th>
        <th scope="col">Telepon</th>
        <th scope="col">Alamat 1</th>
        <th scope="col">Alamat 2</th>
        <th scope="col">Kode Pos</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>

@foreach ($user as $p)


      <tr>
        <td>{{$p->userID}}</td>
        <td>{{$p->nama}}</td>
        <td>{{$p->telepon}}</td>
        <td>{{$p->alamat1}}</td>
        <td>{{$p->alamat2}}</td>
        <td>{{$p->kodepos}}</td>
        <td>{{$p->email}}</td>
        <td>{{$p->password}}</td>
        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalUpdateUser{{ $p->userID }}">Update</button> |
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDeleteUser{{ $p->userID }}">Delete</button></td>
      </tr>
    </tbody>

    <!-- Ini tampil form update user -->
    <div class="modal fade" id="ModalUpdateUser{{ $p->userID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/user/storeupdate" method="post" class="form-floating">
                        @csrf
                        <input type="hidden" name="userID" class="form-control" value="{{ $p->userID }}">
                        <div class="form-floating p-1">
                            <input type="text" name="userID" required="required" class="form-control" value="{{ $p->userID }}">
                            <label for="floatingInputValue">User ID</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="nama" required="required" class="form-control" value="{{ $p->nama }}">
                            <label for="floatingInputValue">Nama </label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="telepon" name="telepon" required="required" class="form-control" value="{{ $p->telepon }}">
                            <label for="floatingInputValue">Telepon</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="alamat1" name="alamat1" required="required" class="form-control" value="{{ $p->alamat1 }}">
                            <label for="floatingInputValue">Alamat 1</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="alamat2" name="alamat2" required="required" class="form-control" value="{{ $p->alamat2 }}">
                            <label for="floatingInputValue">Alamat 2</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="kodepos" name="kodepos" required="required" class="form-control" value="{{ $p->kodepos }}">
                            <label for="floatingInputValue">Kode Pos</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="email" name="email" required="required" class="form-control" value="{{ $p->email }}">
                            <label for="floatingInputValue">Email</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="password" name="password" required="required" class="form-control" value="{{ $p->password }}">
                            <label for="floatingInputValue">Password</label>
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
    <div class="modal fade" id="ModalDeleteUser{{$p->userID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/user/delete/{{$p->userID}}" method="get" class="form-floating">
                        @csrf
                        <div>
                            <h3>Yakin mau menghapus data <b>{{$p->nama}}</b> ?</h3>
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
<div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/user/storeinput" method="post" class="form-floating">
                    @csrf
                    <div class="form-floating p-1">
                        <input type="text" name="userID" required="required" class="form-control">
                        <label for="floatingInputValue">User ID</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="text" name="nama" required="required" class="form-control">
                        <label for="floatingInputValue">Nama </label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="telepon" name="telepon" required="required" class="form-control">
                        <label for="floatingInputValue">Telepon</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="alamat1" name="alamat1" required="required" class="form-control">
                        <label for="floatingInputValue">alamat 1</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="alamat2" name="alamat2" required="required" class="form-control">
                        <label for="floatingInputValue">Alamat 2</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="kodepos" name="kodepos" required="required" class="form-control">
                        <label for="floatingInputValue">Kode Pos</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="email" name="email" required="required" class="form-control">
                        <label for="floatingInputValue">Email</label>
                    </div>
                    <div class="form-floating p-1">
                        <input type="password" name="password" required="required" class="form-control">
                        <label for="floatingInputValue">Password</label>
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