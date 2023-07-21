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
                    <input type="text" placeholder="Cari mobil..." id="myInput" onkeyup="myFunction()" name="search"
                        class="form-control search-input">
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
                            <div class="card shadow-sm" type="button" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $mobil->id }}">
                                <img src="{{ url('storage/mobil/' . $mobil->foto) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5>{{ $mobil->judul }}</h5>
                                    <p class="card-text">Rp {{ number_format($mobil->harga, 2, ',', '.') }}</p>
                                    <p class="card-text">{{ $mobil->deskripsi }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- modal edit data --}}
                        <div class="modal fade" id="edit{{ $mobil->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ url('mobil/' . $mobil->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Item </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Judul Produk" value="{{ $mobil->judul }}"
                                                    name="judul">
                                                <label for="floatingInput">Judul</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingPassword"
                                                    placeholder="Harga Produk" name="harga"
                                                    value="{{ $mobil->harga }}">
                                                <label for="floatingPassword">Harga</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingPassword"
                                                    value="{{ $mobil->deskripsi }}" placeholder="Deskripsi"
                                                    name="deskripsi">
                                                <label for="floatingPassword">Deskripsi</label>
                                            </div>
                                            <input type="hidden" name="oldfoto" value="{{ $mobil->foto }}">
                                            <img src="{{ url('storage/mobil/' . $mobil->foto) }}" class="img-fluid"
                                                alt="">
                                            <div class="form-floating">
                                                <input type="file" class="form-control" name="foto"
                                                    placeholder="Foto" id="floatingPassword">
                                                <label for="floatingPassword">Foto Produk</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $mobil->id }}">
                                                Hapus
                                            </button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end modal edit data --}}

                        <!-- Modal delete -->
                        <div class="modal fade" id="delete{{ $mobil->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <button type="button" class="btn-close m-2 ms-auto" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="modal-body">
                                        <h1 class="text-center fw-bold">DELETE</h1>
                                        <h4 class="text-center mb-3">Yakin data akan dihapus?</h4>
                                        <form action="{{ url('mobil/' . $mobil->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <div class="d-grid gap-2 col-4 mx-auto d-flex">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash text-white me-1"></i>Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end delete model --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('components.cta')
    @include('components.footer')
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, cards, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            cards = document.getElementsByClassName("card");

            // Loop through all cards, and hide those that don't match the search query
            for (i = 0; i < cards.length; i++) {
                var title = cards[i].querySelector("h5");
                var price = cards[i].querySelector(".card-text");
                var description = cards[i].querySelectorAll(".card-text")[1];
                txtValue = title.textContent || title.innerText;
                txtValue += price.textContent || price.innerText;
                txtValue += description.textContent || description.innerText;

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
