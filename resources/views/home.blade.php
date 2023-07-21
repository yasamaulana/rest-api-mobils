@extends('layouts.main')

@section('content')
    @include('components.header')
    <div class="page-header theme-bg-dark py-5 text-center position-relative">
        <div class="theme-bg-shapes-right"></div>
        <div class="theme-bg-shapes-left"></div>
        <div class="container">
            <h1 class="page-heading single-col-max mx-auto">Rental Mobil Mantul</h1>
            <div class="page-intro single-col-max mx-auto">Pilih mobil dengan kenyamanan paling oke
            </div>
            <div class="main-search-box pt-3 d-block mx-auto">
                <form class="search-form w-100">
                    <input type="text" placeholder="Cari mobil..." name="search" class="form-control search-input">
                    <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!--//page-header-->
    <div class="page-content">
        <div class="container">
            <button class="btn btn-success mt-2" type="button" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
                Item Baru</button>

            {{-- modal tambah data --}}
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ url('mobil') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Item Baru</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Judul Produk"
                                        name="judul">
                                    <label for="floatingInput">Judul</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingPassword"
                                        placeholder="Harga Produk" name="harga">
                                    <label for="floatingPassword">Harga</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingPassword" placeholder="Deskripsi"
                                        name="deskripsi">
                                    <label for="floatingPassword">Deskripsi</label>
                                </div>
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="foto" placeholder="Foto"
                                        id="floatingPassword">
                                    <label for="floatingPassword">Foto Produk</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end modal tambah data --}}
            <div class="docs-overview py-5">
                <div class="row justify-content-center">
                    @foreach ($mobils as $mobil)
                        <div class="col-12 col-lg-4 py-3">
                            <div class="card  shadow-sm">
                                <img src="{{ url('storage/mobil/' . $mobil->foto) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5>{{ $mobil->judul }}</h5>
                                    <p class="card-text">Rp {{ number_format($mobil->harga, 2, ',', '.') }}</p>
                                    <p class="card-text">{{ $mobil->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('components.cta')
    @include('components.footer')
@endsection
