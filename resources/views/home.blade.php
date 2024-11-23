@extends('component.base')

@section('page-content')
  {{-- BAGIAN CAROUSEL --}}
  <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/blaa.gif') }}" class="d-block w-100 img-h" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/blaa1.png') }}" class="d-block w-100 img-h" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/blaa2.png') }}" class="d-block w-100 img-h" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  {{-- BAGIAN FILTER 2 --}}
  <div class="container">
    <div class="row overflow-hidden py-2">
      <div class="col-4 col-sm-4 mt-2">
      <a href="{{ route('filter.kategori', ['kategori' => 'Pria']) }}">
          <div class="container gambaran1"></div>
          <p class="texto headings">Pria</p>
        </a>
      </div>
      <div class="col-4 col-sm-4 mt-2">
      <a href="{{ route('filter.kategori', ['kategori' => 'Wanita']) }}">
          <div class="container gambaran2"></div>
          <p class="texto headings">Wanita</p>
        </a>
      </div>
      <div class="col-4 col-sm-4 mt-2">
      <a href="{{ route('filter.kategori', ['kategori' => 'Anak-anak']) }}">
          <div class="container gambaran3"></div>
          <p class="texto headings">Anak-anak</p>
        </a>
      </div>
    </div>

    <h3><b>Rekomendasi ></b></h3>
    <div class="row overflow-hidden">
        @if(isset($query))
            <p>Hasil pencarian untuk: <strong>"{{ $query }}"</strong></p>
        @endif

        @if($produk->isEmpty())
            <p>Produk yang Anda cari tidak ditemukan.</p>
        @else
            @foreach ($produk as $item)
                <div class="col-4 col-md-2 p-1 p-md-2">
                  <a href="{{ route('detail.produk', $item->id_sepatu) }}">
                    <img src="{{ asset('storage/images/produk/' . $item->gambar_sepatu) }}" class="w-100 border rounded shadow-sm product" alt="{{ $item->nama_sepatu }}">
                  </a>
                </div>
            @endforeach
        @endif

      {{-- <div class="col-4 col-md-2 p-1 p-md-2">
        <img src="{{ asset('image/con1.jpg') }}" class="w-100 border rounded shadow-sm product" alt="Sepatu 1">
      </div>
      <div class="col-4 col-md-2 p-1 p-md-2">
        <img src="{{ asset('image/nike.png') }}" class="w-100 border rounded shadow-sm product" alt="Sepatu 1">
      </div>
      <div class="col-4 col-md-2 p-1 p-md-2">
        <img src="{{ asset('image/nike.png') }}" class="w-100 border rounded shadow-sm product" alt="Sepatu 1">
      </div>
      <div class="col-4 col-md-2 p-1 p-md-2">
        <img src="{{ asset('image/nike.png') }}" class="w-100 border rounded shadow-sm product" alt="Sepatu 1">
      </div>
      <div class="col-4 col-md-2 p-1 p-md-2">
        <img src="{{ asset('image/nike.png') }}" class="w-100 border rounded shadow-sm product" alt="Sepatu 1">
      </div>
      <div class="col-4 col-md-2 p-1 p-md-2">
        <img src="{{ asset('image/nike.png') }}" class="w-100 border rounded shadow-sm product" alt="Sepatu 1">
      </div> --}}
    </div>
  </div>
@endsection