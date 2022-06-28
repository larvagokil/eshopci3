  <!-- footer -->
  <div class="footer">
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-xs-12">
                  <div class="first">
                      <h4>Item</h4>
                      <p><a href="<?= base_url('main/cari?kata=')?>laptop" class="text-decoration-none text-light"> Laptop </a></p>
                      <p><a href="<?= base_url('main/cari?kata=')?>smartphone" class="text-decoration-none text-light"> Smartphone</a></p>
                      <p><a href="<?= base_url('main/cari?kata=')?>sd+card" class="text-decoration-none text-light"> Sd Card</a></p>
                      <p><a href="<?= base_url('main/cari?kata=')?>printer" class="text-decoration-none text-light"> Printer</a></p>
                  </div>
              </div>

              <div class="col-md-4 col-xs-12">
                  <div class="second">
                      <h4> About</h4>
                      <li><a href="<?= base_url('main/about') ?>">About Us</a></li>
                      <a href="https://github.com/larvagokil/eshopci3"> <i class="fab fa-github fa-2x margin"></i></a>
                      <a href="https://api.whatsapp.com/send?phone=628971760928"> <i class="fab fa-whatsapp fa-2x margin"></i></a>
                      <a href="https://www.youtube.com/"><i class="fab fa-youtube fa-2x margin"></i></a>
                      <p>
                      <h4><em>Selamat Berbelanja!</em></h4>
                      </p>
                  </div>
              </div>

              <div class="col-md-4 col-xs-12">
                  <div class="third">
                      <h4> Contact</h4>
                      <ul>
                          <li><a href="<?= base_url('main/contact'); ?>">Contact Us</a></li>
                          <li><i class="far fa-envelope"></i> eshopindo.k2@gmail.com</li>
                          <li><i class="fas fa-map-marker-alt"></i> Indonesia, ID </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row">
          </div>
      </div>
  </div>

  </body>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
              </div>
          </div>
      </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
      function previewImg() {
          const image = document.querySelector('#image');
          const imageLabel = document.querySelector('.form-control');
          const imgPreview = document.querySelector('.img-thumbnail');

          imageLabel.textContent = image.files[0].name;
          const fileImage = new FileReader();
          fileImage.readAsDataURL(image.files[0]);

          fileImage.onload = function(e) {
              imgPreview.src = e.target.result;
          }
      }
  </script>

  <script>
      const scriptURL = 'https://script.google.com/macros/s/AKfycbyCm85fT9YwT7uZRl_-lygRHiu83-VVXQbPgu1S4r4N8QyMMTfDjCy2PeBkPKl3Rok/exec'
      const form = document.forms['contact-form']
      const btnKirim = document.querySelector('.btn-kirim');
      const btnLoading = document.querySelector('.btn-loading');
      const sendAlert = document.querySelector('.send-alert');

      form.addEventListener('submit', e => {
          e.preventDefault()
          // ketika tombol submit diklik
          // tampilkan tombol loading, hilangkan tombol kirim
          btnLoading.classList.toggle('d-none');
          btnKirim.classList.toggle('d-none');
          fetch(scriptURL, {
                  method: 'POST',
                  body: new FormData(form)
              })
              .then(response => {
                  // tampilkan tombol kirim, hilangkan tombol loading
                  btnLoading.classList.toggle('d-none');
                  btnKirim.classList.toggle('d-none');
                  // tampilkan alert
                  sendAlert.classList.toggle('d-none');
                  //reset form setelah berhasil terkirim
                  form.reset();
                  console.log('Success!', response)
              })
              .catch(error => {
                  console.error('Error!', error.message)
              })
      })
  </script>
  </body>

  </html>