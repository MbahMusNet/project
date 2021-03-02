<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Member</title>
  <style type="text/css">
    label {
      width: 100px;
      display: inline-block;
      margin-bottom: 10px;
    }

    input[type=text] {
      width: 280px;
    }

    textarea {
      width: 280px;
      height: 150px;
      vertical-align: text-top;
    }

    input [type=submit] {
      margin-top: 30px;
      margin-left: 105px;
    }
  </style>
</head>

<body>
  <h1>Menu Member</h1>
  <p>Beberapa menu yang bisa diakses</p>
  <a href="<?php echo base_url('front/tambah_artikel/'); ?>">Tambah Artikel</a> |
  <a href="<?php echo base_url('front/daftar_artikel/'); ?>">Daftar Artikel</a>

</body>

</html>