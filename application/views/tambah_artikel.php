<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Artikel</title>
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
  <h1>Form Tambah Artikel</h1>
  <form method="POST" action="<?php echo base_url('front/tambah_artikel/kirim'); ?>">
    <label>Judul</label><input type="text" name="title" /><br />
    <label>Penulis</label><input type="text" name="author" /><br />
    <label>Konten</label><textarea name="content"></textarea><br />
    <input type="submit" name="submit" value="Tambah Artikel" />
  </form>
</body>

</html>