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
    table {
      width: 78%;
      border: 1px solid #000;
      margin: 20px 0 30px 0;
    }

    table tr th {
      font-size: 18px;
      background: #efefef;
      border: none;
      padding: 10px;
    }

    table tr td {
      text-align: center;
      padding: 10px;
      border: 1px solid #333;
    }
  </style>
</head>

<body>
  <h1>Daftar Artikel</h1>
  <p>Berikut adalah menu yang bisa diakses</p>
  <a href="<?= base_url('front/tambah_artikel'); ?>">Tambah Artikel</a> |
  <a href="<?= base_url('front/daftar_artikel'); ?>">Daftar Artikel</a>

  <table>
    <thead>
      <tr>
        <th width="45%">Judul</th>
        <th>Penulis</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($record)) : ?>
        <?php foreach ($record as $row) : ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><a href="<?php echo base_url('front/edit_artikel/' . $row['ID']); ?>">Edit</a> |
              <a href="<?php echo base_url('front/delete_artikel/' . $row['ID']); ?>">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</body>

</html>