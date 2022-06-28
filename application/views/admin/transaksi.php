<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>
    <!-- bag atas -->
    <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Barang yang dipesan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Barang yang diantarkan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Barang yang diproses
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">2</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Barang yang belum dibayar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir bag atas -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Trx id</th>
                            <th scope="col">Nama Penerima</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">total harga</th>
                            <th scope="col">status</th>
                            <th scope="col" style="white-space: nowrap">waktu transaksi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($trans as $trs) :
                            $brg = $this->barangm->detail($trs['id_barang'])->row_array();
                            ?>   
                        <tr>
                            <th scope="row"><?= $i++; ?></th>                        
                            <td><?= $trs['id_transaksi']; ?></td>
                            <td><?= $trs['nm_lengkap']; ?></td>
                            <td><?= $trs['no_telp']; ?></td>
                            <td>Rp.<?= number_format($trs['total_harga'],0,",","."); ?></td>
                            <td><?= $trs['status']; ?></td>
                            <td><?= $trs['waktu_transaksi']; ?></td>
                            <td>
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#transModal"
                                data-id="<?= $trs['id_transaksi'] ?>"
                                data-nm="<?= $trs['nm_lengkap'] ?>"
                                data-notelp="<?= $trs['no_telp'] ?>"
                                data-alamat="<?= $trs['alamat'] ?>"
                                data-jeniskirim="<?= $trs['jeniskirim'] ?>"
                                data-jenisbayar="<?= $trs['jenisbayar'] ?>"
                                data-idb="<?= $trs['id_barang'] ?>"
                                data-jml="<?= $trs['jml_barang'] ?>"
                                data-total="Rp.<?= number_format($trs['total_harga'],0,",","."); ?>"
                                data-waktu="<?= $trs['waktu_transaksi'] ?>"
                                data-status="<?= $trs['status'] ?>"
                                >Detail</a>
                                <?php if ($trs['status'] == "Menunggu Konfirmasi") { ?>
                                <a href="<?= base_url('admin/protrans/') . $trs['id_transaksi'] . '/tolak' ?>" onclick="return confirm('Apakah anda yakin ingin menolak transaksi ini . ?');" class="btn btn-sm btn-danger">Tolak</a>

                                <a href="<?= base_url('admin/protrans/') . $trs['id_transaksi'] . '/proses' ?>" onclick="return confirm('Apakah anda ingin memproses transaksi ?');" class="btn btn-sm btn-info">Proses</a>
                                <?php
                                } elseif ($trs['status'] == "Diproses") {
                                ?>
                                <a href="<?= base_url('admin/protrans/') . $trs['id_transaksi'] . '/selesai' ?>" onclick="return confirm('Apakah anda ingin menyelesaikan transaksi ini ?, Pastikan Pelanggan telah menerima barang');" class="btn btn-sm btn-success">Selesaikan</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->