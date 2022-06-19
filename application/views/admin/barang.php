<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row-lg">
        
        <div class="row-lg">
            <div class="col">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gambar Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($barg as $br) : ?>   
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $br['nm_barang']; ?></td>
                            <td><img src="<?= base_url('assets/img/barang/') . $br['gbr_barang']; ?>" class="img-thumbnail" width="200px" alt="ini gambar"></td>
                            <td>Rp.<?= number_format($br['hrg_barang'],2,",",".") ; ?></td>
                            <td><?= $br['jml_barang']; ?></td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm"
                                data-toggle="modal" data-target="#edit-barg"
                                    data-id="<?= $br['id_barang'] ?>"
                                    data-nm="<?= $br['nm_barang'] ?>"
                                    data-gbr="<?= $br['gbr_barang'] ?>"
                                    data-dkr="<?= htmlspecialchars($br['dkr_barang']) ?>"
                                    data-hrg="<?= $br['hrg_barang'] ?>"
                                    data-jml="<?= $br['jml_barang'] ?>"
                                    >Ubah</a>
                                <a href="" class="btn btn-danger btn-sm">Hapus</a>
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
<!-- Modal ubah -->
<div class="modal fade" id="edit-barg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mengubah Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?= form_open_multipart('admin/edit_brg');?>
        <div class="modal-body">
            <input type="hidden" name="id" id="id">
            <label for="nm">Nama Produk</label> <br>
            <input type="text" name="nm" id="nm" maxlength="100" class="form-control" autofocus required> <br>
            <input type="hidden" name="gbr" id="gbr" class="form-control" required>
            <label for="userfile" class="form-label">Gambar</label>
            <input class="form-control" name="userfile" type="file" id="userfile" >
            <small>Maks ukuran gambar adalah 3MB!</small> <br>
            <label for="dkr">Deskripsi</label><br>
            <textarea name="dkr" id="dkr" class="form-control" rows="5" maxlength="5000" required></textarea><br>
            <script>
                CKEDITOR.replace( 'dkr' );
            </script> 
            <label for="hrg">Harga</label><br>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp.</span>
                <input type="number" name="hrg" id="hrg" class="form-control" required>
            </div> <br>
            <label for="jml">Jumlah</label><br>
            <input type="number" name="jml" id="jml" class="form-control" required> <br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button></form>
        </div>
        </div>
    </div>
</div>