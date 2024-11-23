<form action="/cari" method="POST">
  @csrf
  <h5><b>Jenis Kelamin</b></h5>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="pria" id="jk_sepatu1" name="jk_sepatu[]">
    <label class="form-check-label" for="jk_sepatu1">Pria</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="wanita" id="jk_sepatu2" name="jk_sepatu[]">
    <label class="form-check-label" for="jk_sepatu2">Wanita</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="unisex" id="jk_sepatu3" name="jk_sepatu[]">
    <label class="form-check-label" for="jk_sepatu3">Unisex</label>
  </div><hr>
  <h5><b>Brand</b></h5>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="adidas" id="merek_sepatu1" name="merek_sepatu[]">
    <label class="form-check-label" for="merek_sepatu1">ADIDAS</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="nike" id="merek_sepatu2" name="merek_sepatu[]">
    <label class="form-check-label" for="merek_sepatu2">NIKE</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="converse" id="merek_sepatu3" name="merek_sepatu[]">
    <label class="form-check-label" for="merek_sepatu3">CONVERSE</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="crocs" id="merek_sepatu4" name="merek_sepatu[]">
    <label class="form-check-label" for="merek_sepatu4">CROCS</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="puma" id="merek_sepatu5" name="merek_sepatu[]">
    <label class="form-check-label" for="merek_sepatu5">PUMA</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="new_balance" id="merek_sepatu6" name="merek_sepatu[]">
    <label class="form-check-label" for="merek_sepatu6">NEW BALANCE</label>
  </div>
  <hr>
  <h5><b>Kategori</b></h5>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="sport" id="kategori_sepatu1" name="kategori_sepatu[]">
    <label class="form-check-label" for="kategori_sepatu1">Sport</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="casual" id="kategori_sepatu2" name="kategori_sepatu[]">
    <label class="form-check-label" for="kategori_sepatu2">Casual</label>
  </div><hr>
  <h5><b>Harga</b></h5>
  <div class="d-flex d-md-block">
    <div class="input-group mb-3 pe-2 pe-md-0">
      <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
      <input type="number" class="form-control" placeholder="Terendah" id="harga_sepatu1" name="harga_sepatu_rendah" value="">
    </div>
    <div class="input-group mb-3 ps-2 ps-md-0">
      <span class="input-group-text" id="basic-addon1"><b>Rp</b></span>
      <input type="number" class="form-control" placeholder="Tertinggi" id="harga_sepatu2" name="harga_sepatu_tinggi" value="">
    </div>
  </div>
  <button type="button" class="btn btn-dark my-2" onclick="setPrice(50000, 120000)">Rp50rb - 120rb</button>
  <button type="button" class="btn btn-dark my-2" onclick="setPrice(120000, 300000)">Rp120rb - 300rb</button>
  <button type="button" class="btn btn-dark my-2" onclick="setPrice(300000, 500000)">Rp300rb - 500rb</button>
  <hr><button type="submit" class="btn btn-success float-end">Save Changes</button>
</form>
<script>
  function setPrice(min, max) {
      document.getElementById('harga_sepatu1').value = min;
      document.getElementById('harga_sepatu2').value = max;
  }
</script>