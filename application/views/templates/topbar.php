<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow py-0" style="background-color: #e3f2fd;">
  <div class="container">


    <button class="navbar-toggler mx-4" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <a class="navbar-brand" href="<?= base_url() ?>">
        <img height="85" width="auto" src="<?= base_url('assets/img/profile/logoweb-gif.gif'); ?>">
      </a>
      <form method="get" action="<?= base_url('main/cari') ?>" class="form-inline my-2 my-lg-0 ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Ketik di sini untuk mencari produk!" name="kata" aria-label="Search" size="70">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
      </form>
      <ul class="navbar-nav pl-3 my-auto">
        <li class="nav-item ">
          <a class="nav-link" href="<?= base_url('main/about'); ?>">About</a>
        </li>
        <?php
        if (!$this->session->userdata('email')) {
        ?>
          <li class="nav-item">
            <a class="nav-link btn btn-sm btn-success text-light" href="<?= base_url('auth'); ?>">Masuk</a>
          </li>
        <?php } else { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false" data-bs-toggle="tooltip" title="<?= $this->session->userdata('email') ?>">Hai, <?= mb_strimwidth($this->session->userdata('email'), 0, 10, "..."); ?>
              <img class="img-profile rounded-circle" width="28px" src="<?= base_url('assets/img/profile/' . $this->session->userdata('img')) ?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
              <?php if ($this->session->userdata('role_id') == 2) { ?>
                <a class="dropdown-item" href="<?= base_url('user/profile'); ?>">Profil</a>
                <a class="dropdown-item" href="<?= base_url('user/transaksi'); ?>">Transaksi</a>
              <?php } else { ?>
                <a class="dropdown-item" href="<?= base_url('admin') ?>">Halaman Admin</a>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>

  </div>
</nav>
<!-- navar -->