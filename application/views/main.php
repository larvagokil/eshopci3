<!-- Kontener -->
<div class="container p-3">
  <!-- Content here -->
  <?= $this->session->flashdata('pesan'); ?>

  <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img style="max-width:100%" src="<?= base_url('assets/img/barang/1.png') ?>">
      </div>
      <div class="carousel-item">
        <img style="max-width:100%" src="<?= base_url('assets/img/barang/2.png') ?>">
      </div>
      <div class="carousel-item">
        <img style="max-width:100%" src="<?= base_url('assets/img/barang/3.png') ?>">
      </div>
      <div class="carousel-item">
        <img style="max-width:100%" src="<?= base_url('assets/img/barang/4.png') ?>">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

  </div>



  <hr>
  <div>
    <?php foreach ($brg as $b) { ?>

      <div class="card m-3 shadow" style="width: 11rem;float:left;">
        <img class="card-img-top img-thumbnail" src="<?= base_url('assets/img/barang/') . $b->gbr_barang ?>" alt="Card image cap">
        <div class="p-2">

          <h5 class="card-title" style="font-size:14px;overflow:hidden;line-height:1em;height:2em"><?= $b->nm_barang ?></h5>
          <strong>
            <p class="my-2">Rp. <?= number_format($b->hrg_barang, 2, ",", "."); ?></p>
          </strong>
          <p class="my-1">Kota Bekasi</p>
          <a href="<?= base_url('produk/' . $b->id_barang) ?>" class="stretched-link" data-bs-toggle="tooltip" title="<?= $b->nm_barang ?>"></a>
        </div>
      </div>
    <?php } ?>
    <div style="clear:left"></div>
  </div>

</div>
<!-- Kontener -->