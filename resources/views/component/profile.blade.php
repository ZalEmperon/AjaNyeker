<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">PROFIL ANDA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/profile" method="POST">
        @csrf
        <div class="modal-body">
          <label>Nama Lengkap</label>
          <input type="text" class="form-control mb-3" placeholder="Nama Lengkap Anda..." name="nama_lengkap" value="{{ $databiodata != null ? $databiodata->nama_lengkap : '' }}">
          <label>Nomor Handphone</label>
          <input type="text" class="form-control mb-3" placeholder="Nomor Handphone Anda..." name="phone_number" value="{{ $databiodata ? $databiodata->phone_number : (Auth::check() ? Auth::user()->phone_number : '') }}">
          <label>Alamat</label>
          <input type="text" class="form-control" placeholder="Alamat Lengkap Anda..." name="alamat" value="{{ $databiodata != null ? $databiodata->alamat : '' }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>