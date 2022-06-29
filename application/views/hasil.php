<!-- Kontener -->
<div class="container p-3">
  <!-- Content here -->
  <div class="alert alert-light alert-message" role="alert">Menampilkan hasil pencarian dari <?= $kata ?></div>

  <hr>
  <div class="row justify-content-md-center">
    <?php foreach ($brg as $b) { ?>

      <div class="card m-3 shadow" style="width: 11rem;">
        <img class="card-img-top img-thumbnail" src="<?= base_url('assets/img/barang/') . $b->gbr_barang ?>" alt="Card image cap">
        <div class="p-2">

          <h5 class="card-title" style="font-size:14px;overflow:hidden;line-height:1em;height:2em"><?= $b->nm_barang ?></h5>
          <strong>
            <p class="my-2">Rp. <?= number_format($b->hrg_barang, 2, ",", "."); ?></p>
          </strong>
          <p class="my-1">Kota Bekasi</p>          
          <span class="badge badge-dark">Stok <?=$b->jml_barang?></span>
          <a href="<?= base_url('produk/' . $b->id_barang) ?>" class="stretched-link" data-bs-toggle="tooltip" title="<?= $b->nm_barang ?>"></a>
        </div>
      </div>
    <?php } ?>
  </div>

</div>
<!-- Kontener -->