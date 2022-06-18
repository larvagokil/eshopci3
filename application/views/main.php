<!-- Kontener -->
<div class="container p-3">
        <!-- Content here -->
        <?= $this->session->flashdata('pesan'); ?>
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
        <div >
        <?php foreach ($brg as $b) { ?>
          
          <div class="card m-3 shadow" style="width: 11rem;float:left;">
            <img class="card-img-top img-thumbnail" src="<?= base_url('assets/img/barang/') . $b->gbr_barang ?>" alt="Card image cap">
            <div class="p-2" >
              
              <h5 class="card-title" style="font-size:14px;overflow:hidden;line-height:1em;height:2em"><?= $b->nm_barang ?></h5>              
              <strong><p class="my-2">Rp. <?= number_format($b->hrg_barang,2,",",".");?></p></strong>
              <p class="my-1">Kota Bekasi</p>
              <a href="<?= base_url('produk/'.$b->id_barang ) ?>" class="stretched-link" data-bs-toggle="tooltip" title="<?= $b->nm_barang?>"></a>
            </div>
          </div>
          <?php } ?>          
          <div style="clear:left"></div>
        </div>
        
    </div>
    <!-- Kontener -->