<?php
function slugify(string $text): string {
  $text = trim($text);
  $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
  $text = preg_replace('~[^\\pL\\d]+~u', '-', $text);
  $text = preg_replace('~[^-a-z0-9]+~i', '', $text);
  $text = trim($text, '-');
  $text = strtolower($text);
  return $text ?: 'contenu-'.bin2hex(random_bytes(3));
}
