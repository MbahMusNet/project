<?php
defined('BASEPATH') or exit('No direct script access allowed');

function rupiahkan($nominal)
{
  return 'Rp ' . number_format($nominal, 0, ',', '.');
}
