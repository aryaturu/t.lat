<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg fixed-top bg-primary">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/user">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/kategori">Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/produk">Produk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/keranjang">Keranjang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/userorder">UserOrder</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <p class="p-2">@yield('konten')</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>