<div class="container py-2" style="background-color:white">
    <h3>Daftar Riwayat Transaksi</h3>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <?php
        $cek = $this->db->get_where('transaksi', ['nm_user' => $this->session->userdata('email')])->num_rows();
            if ($cek < 1) {
        ?>
        <div class="col mb-4 pt-3">
        <blockquote class="blockquote text-center">
            <p class="mb-0 font-italic">Belum ada Riwayat transaksi, silahkan berbelanja terlebih dahulu</p>
        </blockquote> 
        </div>
        <?php
        } else {
           foreach ($trx as $tr) {
        ?>
        <div class="col-md-4 mb-4 pt-3">
            <div class="card">
                <div class="card-body">
                    <h5>No. Trx : <?= $tr['id_transaksi']; ?></h5>
                    <p class="pt-0">Nama Penerima : <?= $tr['nm_lengkap'] ?></p>
                    <?php
                        $idb = $tr['id_barang'];
                       $q = $this->db->get_where('barang',['id_barang' => $idb])->row_array()['nm_barang'];
                    ?>
                    <p><?= $q ?></p>
                    <p>Jumlah : <?= $tr['jml_barang']; ?> pcs</p>
                    <p>Total Harga : <strong> Rp <?= number_format($tr['total_harga'],0,",",".") ?></strong></p>
                    <hr>
                    <p>Status : <span class="badge "><?= $tr['status'] ?></span></p>
                </div>
            </div>    
        </div>
        <?php
           } }
        ?>
    </div>
    <p><small>
        Note : 
        <ul>
            <li>
                <span class="badge bg-info text-light">Menunggu Konfirmasi</span> : Menunggu Admin untuk memproses Transaksi.
            </li>
            <li>
                <span class="badge bg-primary text-light">Diproses</span> : Transaksi telah di Konfirmasi & Barang akan dikirim ke alamat yang telah ditentukan sebelumnya.
            </li>
            <li>
                <span class="badge bg-success text-light">Selesai</span> : Transaksi Telah selesai.
            </li>
            <li>
                <span class="badge bg-danger text-light">Gagal</span> : Transaksi telah di Tolak, Karena (Alamat tidak benar / No telepon tidak bisa dihubungi / lainnya)
            </li>
        </ul>
    </small></p>
</div>