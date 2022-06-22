<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>

    <div class="row-lg">

        <div class="row-lg">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Dibuat pada</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($org as $o) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $o['name']; ?></td>
                                <td><?= $o['email']; ?></td>
                                <td><?= date('d F Y | h:m A', $user['date_created']); ?></td>
                                <td>
                                    <form action="<?= base_url('/admin/delete_user'); ?>/<?= $o['id']; ?>" method="post" class="d-inline">
                                        <input type="hidden" name="id" value="Hapus">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                                    </form>
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