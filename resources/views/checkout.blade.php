@extends('component.base')

@section('page-content')
  <div class="container">
    <h3 class="fw-bold">CHECKOUT PEMBELIAN</h3>
    <div class="row">
      <div class="col-12 col-md-6">
        <h5 class="fw-bold">DATA PEMBELIAN</h5>
        <form action="">
          <label for="">Nama Lengkap</label>
          <input type="text" class="form-control" value="{{ $databiodata->nama_lengkap }}" disabled>
          <label for="">Alamat </label>
          <input type="text" class="form-control" value="{{ $databiodata->alamat }}">
          <h5 class="fw-bold mt-3">METODE PEMBAYARAN</h5>
          <div class="d-flex flex-column">
            <input type="radio" class="btn-check" id="payment1" name="payment">
            <label class="btn btn-primary rounded-0 mb-3" for="payment1" required><b>QRIS</b></label>
            <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed bg-primary d-block text-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <span class="text-white"><b>Transfer</b></span>
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body pb-0">
                    <div class="row">
                      <div class="col-6">
                        <input type="radio" class="btn-check" id="payment21" name="payment">
                        <label class="btn btn-primary rounded-0 mb-3 w-100" for="payment21" required>BCA</label>
                      </div>
                      <div class="col-6">
                        <input type="radio" class="btn-check" id="payment22" name="payment">
                        <label class="btn btn-primary rounded-0 mb-3 w-100" for="payment22" required>BRI</label>
                      </div>
                      <div class="col-6">
                        <input type="radio" class="btn-check" id="payment23" name="payment">
                        <label class="btn btn-primary rounded-0 mb-3 w-100" for="payment23" required>Mandiri</label>
                      </div>
                      <div class="col-6">
                        <input type="radio" class="btn-check" id="payment24" name="payment">
                        <label class="btn btn-primary rounded-0 mb-3 w-100" for="payment24" required>BNI</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="radio" class="btn-check" id="payment3" name="payment">
            <label class="btn btn-primary rounded-0 mb-3" for="payment3" required><b>COD</b></label>
          </div>
          <input type="radio" class="btn-check" id="btn-check-3">
          <label class="btn btn-success rounded-0 mb-3 w-100" for="btn-check-3"><b>Beli Sekarang</b></label>
        </form>
      </div>
  
      <div class="col-12 col-md-6">
        <div class="container bg-light border border-secondary mt-3">
          <div class="mx-3 mt-3">
            <h4 class="px-0 fw-bold">ORDER SUMMARY</h4><hr>
            @if(empty($itemsdata))
              <p class="text-center">Keranjang Anda kosong.</p>
            @else
              @foreach ($itemsdata as $item)
                <h5 class="fw-bold"><span>{{ $item['jumlah_produk'] }}</span>X <span>{{ $item['nama_sepatu'] }}</span></h5>
                <p class="mb-0">Varian <span>{{ $item['varian_sepatu'] }}</span>, Size <span>{{ $item['ukuran_sepatu'] }}</span></p>
                <p>Rp <span>{{ $item['harga_sepatu'] * $item['jumlah_produk'] }}</span></p>
              @endforeach
              {{-- <h5 class="fw-bold"><span>{{ $itemsdata['jumlah_produk'] }}</span>X <span>{{ $itemsdata['nama_sepatu'] }}</span></h5>
              <p class="mb-0">Varian <span>{{ $itemsdata['varian_sepatu'] }}</span>, Size <span>{{ $itemsdata['ukuran_sepatu'] }}</span></p>
              <p>Rp <span>{{ $itemsdata['harga_sepatu'] * $itemsdata['jumlah_produk'] }}</span></p> --}}
              <hr><p>Subtotal: Rp <span>{{ $subtotal }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection