@extends('component.base')

@section('page-content')
  @php
      use Illuminate\Support\Arr;
      $varian_sepatu = Arr::wrap($produk->varian_sepatu);
  @endphp
  <div class="container">
    <h3 class="fw-bold">DETAIL PRODUK</h3>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="ratio ratio-1x1">
          <img src="{{ asset('storage/images/produk/' . $produk->gambar_sepatu) }}" class="border rounded" style="object-fit: cover;background-position: center center;" alt="{{ $produk->nama_sepatu }}">
        </div>  
      </div>
      <div class="col-12 col-md-6">
        <div class="container">
          <form action="" method="" id="productData">
            @csrf
            <h4 class="fw-bold">{{ $produk->nama_sepatu }}</></h1>
            <input type="hidden" value="{{ $produk->id_sepatu }}" id="id_sepatu" name="id_sepatu" required>
            <h5>{{ $produk->kategori_sepatu }}</h5>
            <h4 class="fw-bold">Rp {{ number_format($produk->harga_sepatu, 0, ',', '.') }}</Rp></h3><br>
            <h5 class="my-2 fw-bold">Varian</h5>
            <div class="custom-radio">
            @foreach($varian as $warna)
              <input type="radio" id="varian_sepatu{{ $loop->index }}" name="varian_sepatu" value="{{ $warna->deskripsi }}" required>
              <label for="varian_sepatu{{ $loop->index }}" style="background-color: {{ $warna->varian_sepatu }};" class="me-2 me-sm-3 rounded"></label>
              @endforeach
            </div>
            <h5 class="my-2 fw-bold">Ukuran</h5>
            <div class="d-flex">
            @foreach($ukuran as $size)
              <input type="radio" class="btn-check" name="ukuran_sepatu" id="ukuran_sepatu{{ $loop->index }}" autocomplete="off" value="{{ $size->ukuran_sepatu }}" required>
              <label class="btn btn-outline-dark me-2 me-sm-3 mb-3" for="ukuran_sepatu{{ $loop->index }}"><b>{{ $size->ukuran_sepatu }}</b></label>
              @endforeach
              </div>
            <div class="input-group mt-2 mb-4 jml_krj">
              <button class="btn btn-primary" type="button" id="button-addon1"><b>+</b></button>
              <input type="number" min="1" max="5" value="1" class="form-control" id="jumlah_produk" name="jumlah_produk" style="width: 15% !important;">
              <button class="btn btn-primary" type="button" id="button-addon1"><b>-</b></button>
            </div>

            <div class="btn-group d-flex d-md-inline" role="group">
              <button type="submit" class="btn btn-dark btn-buy" onclick="setAction('/checkout', 'POST')">Beli Sekarang</button><button type="submit" class="btn btn-success btn-cart" onclick="setAction('/keranjang', 'POST')"><i class="bi bi-cart-plus-fill"></i></button>
            </div>
          </form>
          <h5 class="mt-4 fw-bold">Deskripsi</h5>
          <p style="text-align: justify;">{{ $produk->deskripsi_sepatu }}</p>
        </div>
      </div>
    </div>
  </div>
  <script>
    function setAction(action, method) {
        document.getElementById('productData').action = action;
        document.getElementById('productData').method = method;
    }
  </script>
@endsection