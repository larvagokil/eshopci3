<?php
    
?>
<div class="container border border-4 border-dark" style="margin-top:10px;padding:1rem;" >
    <div class="row" style="height:auto">
        <div class="col-auto overflow-auto">
            <img src="<?= base_url('assets/img/barang/') . $brg['gbr_barang'] ?>" alt="gambar" width="500px" >       
        </div>  
        <div class="col pt-2" >
            <?php
               if ($brg['jml_barang'] < 1) {
            ?>
                <div class="alert alert-warning  fade show" role="alert">
                    <strong>Stok Habis</strong><br> Barang sedang kosong, Silahkan pilih barang yang lain
                </div>
            <?php }?>
            <h4><?= $brg['nm_barang'] ?></h4>
            <p>Terjual : 5 | Ulasan : 5.0 (3 Ulasan)</p>
            <h3><p class="ms-2">Rp<?= number_format($brg['hrg_barang'],2,",",".");?></p></h3>
            Stok : <b><?= $brg['jml_barang'] ?></b>
            <form action="<?= base_url('user/beli') ?>" method="post">
            <div class="row g-2 mt-1">
                <div class="col-sm-2">
                    <input type="hidden" name="id" value="<?= $brg['id_barang'] ?>">
                    <input type="number" name="jumlah" class="form-control" min="1" max="<?= $brg['jml_barang'] ?>" value="1">    
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-outline-dark " type="submit" name="beli" <?php
                       if($brg['jml_barang'] < 1) {echo "disabled";}
                    ?>>Beli </button>
                </div>
            </div>
            </form>
                <hr> 
            <div class="col overflow-auto" style="height:300px">
                <p class="ms-2" > Deskripsi</p>     
                <hr>
                <?= $brg['dkr_barang']; ?>
            </div>
        </div>
    </div>
</div>