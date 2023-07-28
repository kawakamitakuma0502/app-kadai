<?php
require_once(__DIR__ . '/iine.php');

$iineApp = new iine();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if (!isset($_POST['mode'])) {
      throw new \Exception('mode not set!');
    }

    switch ($_POST['mode']) {
      case 'check':
        // URLを丸めてから渡す
        $postPath = $iineApp->checkURL($_POST['path']);
        return $iineApp->iineCount($postPath);
      case 'uncheck':
        // URLを丸めてから渡す
        $postPath = $iineApp->checkURL($_POST['path']);
        return $iineApp->iineUncheck($postPath);
    }
  } catch (Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    echo $e->getMessage();
    exit;
  }
} else {
  try {
    if (!isset($_GET['mode'])) {
      throw new \Exception('mode not set!');
    }
      // URLを丸めてから渡す
      $getPath = $iineApp->checkURL($_GET['path']);
      return $iineApp->showCount($getPath);
  } catch (Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    echo $e->getMessage();
    exit;
  }
}
