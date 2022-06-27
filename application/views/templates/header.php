<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Logo Website -->
  <link rel="apple-touch-icon" href="<?= base_url('assets/img/profile/logoweb-bg.png'); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/profile/logoweb-bg.png'); ?>">

  <title><?= $title; ?></title>

  <!-- css khususon -->
  <?php if (isset($cssk)) { ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/' . $cssk) ?>">
  <?php } ?>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <style>
    a {
      text-decoration: none;
    }

    .footer {
      background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("<?= base_url('assets/img/bgweb2.jpg'); ?>");
      background-size: cover;

    }



    .first {
      margin-top: 40px;
      margin-bottom: 50px;
      color: rgb(206, 206, 206);
      font-family: 'Poppins', sans-serif;
    }

    .first h4 {
      font-size: 20px;
      letter-spacing: 3px;
      position: relative;
      margin-bottom: 20px;
      font-size: 1.6em;
      color: #fff;
      padding-bottom: 0.5em;
    }

    .first h4::after {
      content: '';
      background: #66c83d;
      width: 20%;
      height: 2px;
      position: absolute;
      bottom: 0;
      left: 0;
    }

    .first p {
      font-size: 14px;
    }

    .second {
      margin-top: 40px;
      margin-bottom: 50px;
      color: rgb(206, 206, 206);
      font-family: 'Poppins', sans-serif;
      text-align: center;
    }

    .second2 {
      margin-top: 40px;
      margin-bottom: 50px;
      color: rgb(206, 206, 206);
      font-family: 'Poppins', sans-serif;
      text-align: center;
    }

    .second h4 {
      font-size: 20px;
      letter-spacing: 3px;
      position: relative;
      margin-bottom: 20px;
      font-size: 1.6em;
      color: #fff;
      padding-bottom: 0.5em;
    }

    .second h4::after {
      content: '';
      background: #66c83d;
      width: 20%;
      height: 2px;
      position: absolute;
      bottom: 0;
      left: 40%;
    }


    .second li {
      list-style: none;
      padding-bottom: 30px;
    }

    .second a,
    .second2 a {
      color: rgb(206, 206, 206);
      text-decoration: none;
      letter-spacing: 3px;
      font-weight: bold;
      font-size: 14px;
      transition: 0.2s;
    }

    .second a:hover,
    .second2 a:hover {
      color: #fff;
      transition: 0.2s;
      text-shadow: 1px 1px 20px rgba(0, 0, 0, 1);
      text-decoration: none
    }



    .third {
      margin-top: 40px;
      margin-bottom: 50px;
      color: rgb(206, 206, 206);
      font-family: 'Poppins', sans-serif;
      text-align: right;
    }


    .third h4 {
      font-size: 20px;
      letter-spacing: 3px;
      position: relative;
      margin-bottom: 20px;
      font-size: 1.6em;
      color: #fff;
      padding-bottom: 0.5em;
    }


    .third h4::after {
      content: '';
      background: #66c83d;
      width: 20%;
      height: 2px;
      position: absolute;
      bottom: 0;
      left: 80%;
    }



    .third li {
      list-style: none;
      padding-bottom: 15px;
    }


    .third a {
      color: rgb(206, 206, 206);
      text-decoration: none;
      letter-spacing: 3px;
      font-weight: bold;
      font-size: 14px;
      transition: 0.2s;
    }


    .third a:hover {
      color: #fff;
      transition: 0.2s;
      text-shadow: 1px 1px 20px rgba(0, 0, 0, 1);
    }


    @media screen and (max-width:1000px) {
      .first {
        text-align: center;
      }

      .first h4::after {
        left: 40%;
      }
    }

    @media screen and (max-width:1000px) {
      .third {
        text-align: center;
      }

      .third h4::after {
        left: 40% !important;
      }
    }

    .margin {
      margin-left: 20px;
    }

    .line {
      height: 2px;
      background-color: rgb(206, 206, 206);
      width: 100%;
    }

    .container h1 {
      text-align: center;
      margin-top: 100px;
      margin-bottom: 100px;
    }
  </style>

  <title><?= $judul ?>!</title>
</head>
<!-- ganti bg web disini -->

<body background="<?= base_url('assets/img/bgweb2.jpg'); ?>">