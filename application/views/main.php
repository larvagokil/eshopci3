<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
    a {
      text-decoration: none;
    }
  </style>

  <title><?= $judul ?>!</title>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow" style="background-color: #e3f2fd;">
    <div class="container">

      <a class="navbar-brand fs-3 pr-3" href="">E-Shopindo</a>
      <div class="input-group ">
        <input type="text" class="form-control" placeholder="Cari barang disini !!" aria-label="Username" aria-describedby="basic-addon1">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button">O</button>
        </div>
        <button class="navbar-toggler mx-4" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav pl-3">
          <li class="nav-item ">
            <a class="nav-link" href="?m=start">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link btn btn-sm btn-success" href="<?= base_url('auth'); ?>"><b>Masuk</b></a>
          </li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- navar -->
  <!-- Kontener -->
  <div class="container p-3">
    <!-- Content here -->
    <div class="jumbotron">
      <h1 class="display-4">Hello, world!</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
      </p>
    </div>
    <hr>
    <div style="background-color:bisque">
      <?php foreach ($brg as $b) { ?>

        <div class="card m-3 shadow" style="width: 14rem;float:left;">
          <img class="card-img-top img-thumbnail" src="<?= base_url('assets/img/1.jpg') ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title" style="font-size:14px;overflow:hidden;line-height:1em;height:2em"><?= $b->nm_barang ?></h5>
            <strong>
              <p class="ms-2">Rp. <?= number_format($b->hrg_barang, 2, ",", "."); ?></p>
            </strong>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      <?php } ?>
      <div class="card m-3 shadow" style="width: 14rem;float:left;">
        <img class="card-img-top img-thumbnail" src="<?= base_url('assets/img/1.jpg') ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text" style="font-size:14px;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div style="clear:left"></div>
    </div>

  </div>
  <!-- Kontener -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>