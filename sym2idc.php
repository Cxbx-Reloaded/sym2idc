<?php
  function sanitizeFile($src, $dst) {
    $buffer = str_replace('$', '', file_get_contents($src));
    file_put_contents($dst, $buffer);
  }

  if (PHP_SAPI != 'cli') {
    echo 'This script must be executed from the Command Line';
    exit;
  }

  $filename = isset($argv[1]) ? $argv[1] : '';
  if ($filename == '') {
    echo 'No File Specified';
    exit;
  }

  $filename = getcwd().'/'.$filename;
  $tmpFile = $filename.'.tmp';

  sanitizeFile($filename, $tmpFile);
  $symbolFile = parse_ini_file($tmpFile, true);
  unlink($tmpFile);
?>

#include <idc.idc>

static main()
{
  <?php foreach($symbolFile['Symbols'] as $name => $address) { ?>
    MakeName(0x<?= $address ?>, "<?= $name ?>");
  <?php } ?>
}


