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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get('transaksi')->num_rows() ?></div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get_where('transaksi',['status' => 'Selesai'])->num_rows() ?></div>
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
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $this->db->get_where('transaksi',['status' => 'Diproses'])->num_rows() ?></div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get_where('transaksi',['status' => 'Menunggu Konfirmasi'])->num_rows() ?></div>
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
                            $br = $this->barangm->detail($trs['id_barang'])->row_array();
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
                                data-nmbar="<?= $br['nm_barang'] ?>"
                                data-resi="<?= $trs['jeniskirim'].'-5430981' ?>"
                                data-gbr="<?= base_url('assets/img/barang/'.$br['gbr_barang']) ?>"
                                data-hrbar="Rp.<?= number_format($br['hrg_barang'],0,",","."); ?>"
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
<!-- Detail transaksi Modal -->
<div class="modal fade" id="transModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <button class="close ml-auto pt-2 pr-2" type="button" data-dismiss="modal" aria-label="Close" class="ml-auto d-block">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-header pt-0">
                <h5 class="modal-title mx-auto" id="exampleModalLabel"><b> Detail Transaksi </b></h5>
            </div>
            <div class="modal-body text-dark">
                <div class="row">
                    <div class="col-4"><b>Status</b></div>
                    <div class="col-8 text-right" id="status">Dikirim</div>
                    <div class="col-4">No transaksi</div>
                    <div class="col-8 text-right" id="id">ESI-asdasdadasdasdsada</div>
                    <div class="col-4">Tanggal Pembelian</div>
                    <div class="col-8 text-right" id="waktu">12 juni 2021, 03:05 WIB</div>
                    <div class="col-12"><hr></div>
                </div>
                <div class="row">
                    <div class="col-12"><b>Detail Barang</b></div>
                    <div class="col-12">
                        <div class="card p-2 mt-2">
                        <div class="media">
                            <img width="64px" src="<?= base_url('assets/img/1.jpg') ?>" class="mr-3" alt="..." id="gbr">
                            <div class="media-body">
                                <b id="nmbar">hp xioami mi ultra</b>
                                <p id="hrbar">harga 10 rebu</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                </div>
                <div class="row">
                    <div class="col-12"><b>Info Pengiriman</b></div>
                    <div class="col-4">Kurir</div>
                    <div class="col-8 ml-auto" id="jeniskirim">TIKI</div>
                    <div class="col-4">No. resi</div>
                    <div class="col-8 ml-auto" id="resi">123123112312</div>
                </div>
                <div class="row">
                    <div class="col-4">Nama Penerima</div>
                    <div class="col-8 ml-auto" id="nm">Nama penerima</div>
                    <div class="col-4">No. telp</div>
                    <div class="col-8 ml-auto" id="notelp">628971760928</div>
                    <div class="col-4">Alamat</div>
                    <div class="col-8 ml-auto" id="alamat">jl. bantargebang setu no 51, rt 01/03, padurenan, mustika jaya Bekasi</div>
                    <div class="col-12"><hr></div>
                </div>
                <div class="row">
                    <div class="col-12"><b>Rincian Pembayaran</b></div>
                    <div class="col-6">Metode Pembayaran</div>
                    <div class="col-6 text-right" id="jenisbayar">Indomaret</div>
                    <div class="col-6">Total barang </div>
                    <div class="col-6 text-right" id="jml">berapa barang</div>
                    <div class="col-6">Total ongkir </div>
                    <div class="col-6 text-right">Rp. 20.000</div>
                    <div class="col-6"><b> Total Belanja</b></div>
                    <div class="col-6 text-right" id="total">Rp. 100.000</b></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>