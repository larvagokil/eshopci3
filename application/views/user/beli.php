<?php 
    $ongkir = 20000;
    $totalh = ($brg['hrg_barang'] * $jml) + $ongkir ;
?>
<form action="<?= base_url('user/probeli')?>" method="post">
<div class="container py-3">
    <div class="row g-2">        
        <div class="col-md pt-3 bg-light">
            <h3>Form Pemesanan</h3>
            <div class="mb-3">
                <label for="namalengkap">Nama Lengkap Penerima</label>
                <input type="text" id="namalengkap" name="namalengkap" class="form-control" placeholder="Mohon isi dengan Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="nomortelp">Nomor Telepon / Wa</label>
                <input type="number" id="nomortelp" name="nomortelp" class="form-control" placeholder="Isikan No telepon / Wa anda disini" required>
            </div>
            <div class=mb-3>
                <label for="alamat">Alamat lengkap</label>
                <textarea name="alamat" id="alamat" rows="3" placeholder="Tulis alamat lengkap anda disini" class="form-control" maxlength="255"  required></textarea>
            </div>
            <div class="mb-3">
                <label for="ekspedisi">Jasa Pengiriman</label>
                <select class="form-control" name="jeniskirim" id="jeniskirim">
                    <option value="TIKI" selected>TIKI - Jabodetabek</option>
                    <option value="JNE">JNE - Luar Jabodetabek</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jenisbayar">Jenis Pembayaran</label>
                <select class="form-control" name="jenisbayar" id="jenisbayar">
                    <option value="Indomart" selected>Indomart</option>
                    <option value="Alfamart">Alfamart</option>
                </select>
            </div>
            <input type="hidden" name="id" value="<?= $brg['id_barang']; ?>">
            <input type="hidden" name="jumlah" value="<?= $jml; ?>">
            <input type="hidden" name="total" value="<?= $totalh ?>">
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rincian</h5>
                    <p>Nama Barang : <?= $brg['nm_barang']; ?></p>
                    <p>Jumlah Barang : <?= $jml; ?></p>
                    <p>Harga per Barang : Rp. <?= number_format($brg['hrg_barang'],0,",",".") ?></p>
                    <p>Ongkos Kirim : Rp. 20.000</p>
                    <hr>
                    <h5 class="text-start">Total Harga : Rp. <?= number_format($totalh,0,",",".") ?></h5>
                    <button class="btn btn-outline-info" type="submit" name="bayar">Bayar</button>
                    <p>* catatan : Total Pembayaran akan ditampilkan di menu Daftar Transaksi, setelah anda mengklik bayar </p>
                </div>
            </div>    
        </div>
    </div>
</div>
</form>