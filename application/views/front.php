<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>

<body>
  <h1><?= $title ?></h1>
  <p>Ditulis oleh: <?= $author ?>, Pada <?= $date ?></p>
  <p><?= $content ?></p>

</body>

</html>