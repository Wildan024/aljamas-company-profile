<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog - Aljamas</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css" />
  </head>
  <body>
    <!-- Navbar -->
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top py-1">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
            <img
                src="img/Logo AljamasFood/SVG (Buat dipasang di Website atau Landingpage)/AljamasFood hijau.svg"
                alt="Logo"
                width="30"
                height="30"
                class="d-inline-block align-text-top me-2"
            />
            Aljamas</a
            >
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span> 
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/blog">Blog</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

    <!-- Spacer for fixed-top navbar -->
    <div style="margin-top: 80px"></div>

    <!-- Blog Header -->
    <header class="bg-light py-5 text-center">
      <div class="container">
        <h1 class="display-5 fw-bolder">Artikel Terbaru</h1>
        <p class="lead text-muted">
          Berita dan tips terbaru seputar Tips & Trick makanan
        </p>
      </div>
    </header>

    <!-- Blog Posts -->
    <div class="container my-5">
      <div class="row g-4">
        <!-- Artikel 1 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card card-small h-100 shadow-sm">
            <img src="img/1.jpg" class="card-img-top" alt="Gambar Artikel" />
            <div class="card-body">
              <h5 class="card-title">Cara Merawat Sepatu Putih</h5>
              <p class="card-text">
                Tips membersihkan sepatu putih agar selalu tampak seperti
                baru...
              </p>
              <a href="artikel.html" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
            </div>
          </div>
        </div>

        <!-- Artikel 2 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card card-small h-100 shadow-sm">
            <img src="img/111.jpg" class="card-img-top" alt="Gambar Artikel" />
            <div class="card-body">
              <h5 class="card-title">5 Kesalahan Saat Cuci Sepatu</h5>
              <p class="card-text">
                Kesalahan umum yang membuat sepatu cepat rusak dan cara
                menghindarinya...
              </p>
              <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
            </div>
          </div>
        </div>

        <!-- Artikel 3 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card card-small h-100 shadow-sm">
            <img src="img/11.jpg" class="card-img-top" alt="Gambar Artikel" />
            <div class="card-body">
              <h5 class="card-title">
                Kenapa Sepatu Harus Dijemur Dengan Benar
              </h5>
              <p class="card-text">
                Jemur sepatu sembarangan bisa bikin bau! Ini cara yang tepat...
              </p>
              <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
<footer>
<div class="mt-5 bg-dark py-5">
  <div class="container text-white">
    <div class="row">
      <div class="col">
        <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="img/Logo AljamasFood/SVG (Buat dipasang di Website atau Landingpage)/AljamasFood hijau putih.svg" class="img-footer">
                </div>
                <div class="flex-grow-1 ms-3 text-wrap">
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus ullam aspernatur molestiae sapiente mollitia, et doloribus ipsa. Animi nemo laudantium illum veritatis sed dignissimos, ducimus nostrum amet id aut! Nisi.</p>
                </div>
              </div>
        <hr>
  <div class="container py-3">
    <div class="row text-white">
      <div class="col-md-6">
        <div class="mb-4">
          <p class="fw-semibold d-flex align-items-center gap-2 mb-1">
            <i class="fab fa-whatsapp"></i>
            <span>layanan kami</span>
          </p>
          <a href="#" class="text-white">
            +6282131321321
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-4">
          <p class="fw-semibold d-flex align-items-center gap-2 mb-1">
            <i class="bi bi-map-fill"></i>
            <span>Lokasi Kami Tangerang :</span>
          </p>
          <a href="https://maps.app.goo.gl/Dk6bBkhs9RjUm2QLA" class="d-block small lh-sm text-white-50">
            Jl. Pajajaran Raya No.44, Bencongan Indah, Kec. Klp. Dua, Kabupaten Tangerang, Banten 15811
          </a>
        </div>
        <div class="mb-4">
          <p class="fw-semibold d-flex align-items-center gap-2 mb-1">
            <i class="bi bi-map-fill"></i>
            <span>Lokasi Kami Jawa Tengah :</span>
          </p>
          <a href="#" class="d-block small lh-sm text-white-50">
            Jl. Jati Raya No. 8E, RT 03/RW 10, Pasar minggu, Jakarta Selatan, DKI Jakarta, 12520
          </a>
        </div>
      </div>
    </div>
      </div>

<hr>
    </div>       
  </div>
</div>
</footer>

    <!-- Script -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1200,
      });
    </script>
  </body>
</html>
