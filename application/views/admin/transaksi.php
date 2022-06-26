<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

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
                            <th scope="col">id barang</th>
                            <th scope="col">id transaksi</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jumlah barang</th>
                            <th scope="col">total harga</th>
                            <th scope="col">Jenis Kirim</th>
                            <th scope="col">Jenis Bayar</th>
                            <th scope="col">status</th>
                            <th scope="col" style="white-space: nowrap">waktu transaksi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($trans as $trs) : ?>   
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $trs['id_barang']; ?></td>
                            <td><?= $trs['id_transaksi']; ?></td>
                            <td><?= $trs['nm_lengkap']; ?></td>
                            <td><?= $trs['no_telp']; ?></td>
                            <td><?= $trs['alamat']; ?></td>
                            <td><?= $trs['jml_barang']; ?></td>
                            <td><?= $trs['total_harga']; ?></td>
                            <td><?= $trs['jeniskirim']; ?></td>
                            <td><?= $trs['jenisbayar']; ?></td>
                            <td><?= $trs['status']; ?></td>
                            <td><?= $trs['waktu_transaksi']; ?></td>
                            <td>
                                <?php if ($trs['status'] == "Menunggu Konfirmasi") { ?>
                                <a href="<?= base_url('admin/protrans/') . $trs['id_transaksi'] . '/tolak' ?>" onclick="return confirm('Apakah anda yakin ingin menolak transaksi ini . ?');" class="btn btn-danger">Tolak</a>

                                <a href="<?= base_url('admin/protrans/') . $trs['id_transaksi'] . '/proses' ?>" onclick="return confirm('Apakah anda ingin memproses transaksi ?');" class="btn btn-info">Proses</a>
                                <?php
                                } elseif ($trs['status'] == "Diproses") {
                                ?>
                                <a href="<?= base_url('admin/protrans/') . $trs['id_transaksi'] . '/selesai' ?>" onclick="return confirm('Apakah anda ingin menyelesaikan transaksi ini ?, Pastikan Pelanggan telah menerima barang');" class="btn btn-success">Selesaikan</a>
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