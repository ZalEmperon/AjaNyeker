@extends('component.base')

@section('page-content')
  <div class="container">
    <h3 class="fw-bold">KERANJANG BARANG</h3>
    <div class="row">
      <div class="col-12 col-md-8">
        <div class="container py-3">
          {{-- BARANG BARANGNYA --}}
          @if($keranjang->isEmpty())
            <p class="text-center">Keranjang Anda kosong.</p>
          @else
            @foreach($keranjang as $item)
            <div class="row border border-secondary mb-3">
              <div class="col-4 col-md-3 p-0 position-relative">
                <input class="form-check-input position-absolute cart-check rounded-0 border border-secondary"
                  type="checkbox" value="{{ $item->id_keranjang }}" id="flexCheck{{ $item->id_keranjang }}"
                  data-harga="{{ $item->harga_sepatu }}"
                  data-jumlah="{{ $item->jumlah_produk }}"
                  data-ukuran="{{ $item->ukuran_sepatu }}"
                  data-varian="{{ $item->varian_sepatu }}"
                  data-id_sepatu="{{ $item->id_sepatu }}">
                <div class="ratio ratio-1x1">
                  <img src="{{ asset('storage/images/produk/' . $item->gambar_sepatu) }}" class="border" style="object-fit: cover;background-position: center center;" alt="{{ $item->nama_sepatu }}">
                </div> 
              </div>
              <div class="col-8 col-md-9 d-flex flex-column bg-light py-2">
                <div class="d-flex justify-content-between w-100 flex-grow-1">
                  <div>
                    <h5 class="d-none d-md-block"><b>{{ $item->nama_sepatu }}</b></h5>
                    <h6 style="margin-bottom:0.2rem;">Size {{ $item->ukuran_sepatu }}</h6>
                    <h6 style="margin-bottom:0.2rem;">{{ $item->varian_sepatu }}</h6>
                  </div>
                  <form action="{{ route('keranjang.destroy', $item->id_keranjang) }}" method="POST" class="float-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link p-0">
                      <img src="{{ asset('icon/x-circle-fill.svg') }}" alt="Submit" width="20" height="20">
                    </button>
                  </form>
                </div>            
                <div class="d-flex justify-content-between w-100 align-items-center">
                  <input type="number" class="form-control border-secondary rounded-0" value="{{ $item->jumlah_produk }}" min="1" max="5" style="width: 50px;height:35px;" disabled>
                  <h5 class="float-end m-0 price-label align-text-bottom fw-bold" style="margin-top: auto;">Rp {{ number_format($item->harga_sepatu * $item->jumlah_produk, 0, ',', '.') }}</h5>
                </div>
              </div>
            </div>
            @endforeach
          @endif
          {{-- END BARANG --}}
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="container bg-light border border-secondary mt-3">
          <div class="mx-3 mt-3">
            <div class="row justify-content-between cart-detail">
              <h4 class="px-0 fw-bold">ORDER SUMMARY</h4><hr>
              <div class="col-6 px-0">
                <p><span id="selected-items">{{ $keranjang->sum('jumlah_produk') }}</span> Item</p>
                <p>Delivery</p>
                <p>Tax</p>
                <p><b>Total</b></p>
              </div>
              <div class="col-6 px-0">
                <p class="text-end" id="selected-total">Rp <span id="selected-items">0</span></p>
                <p class="text-end">Free</p>
                <p class="text-end" id="selected-tax">Rp 20000</p>
                <p class="text-end"><b>Rp <span id="selected-grand-total">0</span></b></p>
              </div><hr>
              <form action="/checkout" method="POST" id="checkout-form">
                @csrf
                <input type="hidden" name="selected_items" id="selected-items-input">
                <button class="btn btn-dark rounded-0 mb-3 submittor" type="submit">Checkout</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection