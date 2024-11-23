{{-- BAGIAN NAVBAR --}}
<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img class="logo" src="{{ asset('image/toko.jpg') }}" alt="LOGO"><span class="d-none d-md-inline headings fw-bold">AJA NYEKER</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">        
        <form class="d-flex mx-auto" role="search" action="{{ route('cari') }}" method="GET">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari disini" name="search" aria-describedby="button-addon2">
            <button class="btn btn-warning" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
          </div>
        </form>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link mx-2 d-none d-md-block py-0" aria-current="page" href="/keranjang">
              <button type="button" class="btn btn-primary position-relative">
                <i class="bi bi-cart-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger">{{ $itemCount }}<span class="visually-hidden"></span></span>
              </button>
            </a>
            <a class="nav-link mx-2 d-block d-md-none" aria-current="page" href="/cart">Keranjang<span class="badge rounded-1 text-bg-danger ms-3">{{ $itemCount }}<span class="visually-hidden"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="/filter">Filter</a>
          </li>
          <li class="nav-item dropdown btn-primary">
            <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if (session()->has('username'))
            Welcome, {{ session('username') }}
            @else
            Masuk
            @endif
              
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
            @if (session()->has('username'))
            <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Pengaturan</button></li>
            
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" onclick="location.href='{{ url('logout') }}'">Logout</a></li>
            @else
            <li><a class="dropdown-item" onclick="location.href='{{ url('login') }}'">Login</a></li>
            <li><a class="dropdown-item" onclick="location.href='{{ url('register') }}'">Register</a></li>
            @endif
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
@include('component.profile')