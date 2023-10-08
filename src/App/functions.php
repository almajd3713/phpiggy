<?php
declare(strict_types = 1);

function dd(mixed $val) {
  echo "<pre>";
  print_r($val);
  echo "</pre>";
  die();
}