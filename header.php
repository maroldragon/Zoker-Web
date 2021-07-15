<nav class="navbar navbar-expand-lg">
  <div class="container-lg position-relative">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-brand" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars fa-lg nav-link"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0">
        <li class="nav-item">
          <form class="d-flex">
            <input class="form-control inp-search" type="search" placeholder="Cari" aria-label="Search" id="inputSearch">
            <a class="btn btn-search" href="search.php" id="buttonSearch"><i class="fas fa-search"></i></a>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kategori.php">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontak.php">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tentang.php">Tentang</a>
        </li>
        <li class="nav-item dropdown" id="navbar-profile">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="far fa-user-circle"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <div class="d-none" id="menuGuest">              
              <li><a class="dropdown-item" href="login.php" id="linkProfil">Guest</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="login.php" id="linkLogin">Masuk</a></li>
              <li><a class="dropdown-item" href="register.php" id="linkRegister">Daftar</a></li>
            </div>
            <div class="" id="menuUser">              
              <li><a class="dropdown-item" href="profil.php" id="linkProfil">Iman Fajar Lombu</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="buku_terpinjam.php" id="linkBukuTerpinjam">Buku Terpinjam</a></li>
              <li><a class="dropdown-item" href="riwayat_peminjaman.php" id="linkRiwayatPeminjaman">Riwayat Peminjaman</a></li>
              <li><a class="dropdown-item" href="login.php" id="btn-logout">Keluar</a></li>
            </div>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>