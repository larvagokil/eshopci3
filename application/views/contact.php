<div id="badan">
    <div class="container py-3">
        <div class="alert alert-primary alert-dismissible fade show d-none send-alert" role="alert">
            <strong>Terimakasih!</strong> Pesan & Saran anda berhasil kami terima :)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form name="contact-form" id="contact-form">
            <p>Pesan dan Saran</p>
            <p>Nama
                <label for="your-name">Saya</label> Adalah
                <input class="input" type="text" name="name" id="your-name" minlength="3" placeholder="(Nama Anda)" required> Dan
            </p>

            <p>
                <label for="email">Email Saya</label> Adalah
                <input class="input" type="email" name="email" id="email" placeholder="(Email Anda)" required>
            </p>

            <p> Saya Punya
                <label for="your-message">Saran</label> Untuk Eshopindo,
            </p>

            <p>
                <textarea class="textarea" name="message" id="your-message" placeholder="(Saran Anda)" class="expanding" required></textarea>
            </p>
            <p>
                <button type="submit" class="btn-kirim">
                    <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
                        <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
	l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
                    </svg>
                    <small>Kirim</small>
                </button>
                <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </p>
        </form>
    </div>
</div>