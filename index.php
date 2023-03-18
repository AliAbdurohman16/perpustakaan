<?php require_once 'config/config.php' ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Perpustakaan FKOM</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <link href="public/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    <link href="public/assets/dist/css/style.css" rel="stylesheet">
  </head>
  <body>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Perpustakaan FKOM</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="#">Keluar</a>
        </div>
      </div>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=buku">
                  Buku
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=mahasiswa">
                  Mahasiswa
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=petugas">
                  Petugas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=peminjaman">
                  Peminjaman
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=pengembalian">
                  Pengembalian
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <?php
            $page = $_GET['page'];
            $aksi = $_GET['aksi'];

            if ($page == "buku") {
              if ($aksi == "") {
                include "views/buku/index.php";
              } elseif ($aksi == "tambah") {
                include "views/buku/tambah.php";
              }
            } elseif ($page == "mahasiswa") {
              if ($aksi == "") {
                include "views/mahasiswa/index.php";
              } elseif ($aksi == "tambah") {
                include "views/mahasiswa/tambah.php";
              }
            } elseif ($page == "petugas") {
              if ($aksi == "") {
                include "views/petugas/index.php";
              } elseif ($aksi == "tambah") {
                include "views/petugas/tambah.php";
              }
            } elseif ($page == "peminjaman") {
              if ($aksi == "") {
                include "views/peminjaman/index.php";
              } elseif ($aksi == "tambah") {
                include "views/peminjaman/tambah.php";
              }
            } elseif ($page == "pengembalian") {
              if ($aksi == "") {
                include "views/pengembalian/index.php";
              } elseif ($aksi == "tambah") {
                include "views/pengembalian/tambah.php";
              }
            } else {
              if ($aksi == "") {
                include "views/dashboard/index.php";
              }
            }
          ?>
        </main>
      </div>
    </div>


    <script src="public/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/assets/dist/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  </body>
</html>
