<?php
declare(strict_types = 1);

function dd(mixed $val) {
  echo "<pre>";
  print_r($val);
  echo "</pre>";
  die();
}

function sanitize(mixed $value) {
  // Turns html special characters into normal entities
  return htmlspecialchars((string) $value);
}