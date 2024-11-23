@extends('component.base')

@section('page-content')
<h3 class="m-3 fw-bold">REKOMENDASI</h3>
<div class="d-block d-md-none">
  <button class="btn btn-warning m-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
    aria-controls="offcanvasExample">
    Filter disini
  </button>
</div>
<div class="d-flex">
  {{-- <div class="d-none d-md-block border my-2 ms-2 p-2">
    @include('component.filterChk')
  </div> --}}
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header border d-md-none">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel"><b>Filter</b></h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3 d-md-block">
      @include('component.filterChk')
    </div>
  </div>

  <div class="container-fluid overflow-y-auto">
    <div class="row overflow-hidden">
      @if(isset($query))
      <p>Hasil pencarian untuk: <strong>"{{ $query }}"</strong></p>
    @endif

      @if($produk->isEmpty())
      <p>Produk yang Anda cari tidak ditemukan.</p>
    @else
      @foreach ($produk as $item)
      <div class="col-4 col-md-3 p-1 p-md-2">
        <a href="{{ route('detail.produk', $item->id_sepatu) }}">
          <img src="{{ asset('storage/images/produk/' . $item->gambar_sepatu) }}"
            class="w-100 border rounded shadow-sm product" alt="{{ $item->nama_sepatu }}">
        </a>
      </div>
    @endforeach
    @endif
    </div>
  </div>
</div>
<script>
  function adjustClassBasedOnResolution() {
    var element = document.getElementById("offcanvasExample");
    if (window.innerWidth >= 768) {
      element.classList.remove("offcanvas");
      element.classList.remove("offcanvas-start");
    } else {
      element.classList.add("offcanvas");
      element.classList.add("offcanvas-start");
    }
  }
  window.onload = adjustClassBasedOnResolution;
  window.onresize = adjustClassBasedOnResolution;
</script>
@endsection