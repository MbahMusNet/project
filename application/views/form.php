<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Front View</title>
</head>

<body>
  <h1>Front View</h1>
  <h2>Formulir Contoh Dropdown menggunakan helper Form</h2>

  <?php form_open('front/index'); ?>

  <?= form_label('Jenis Kelamin', 'jenis_kelamin'); ?>
  <?= form_dropdown('jenis_kelamin', $array_jenis_kelamin, 'laki-laki'); ?>

  <?php form_close(); ?>

</body>

</html>