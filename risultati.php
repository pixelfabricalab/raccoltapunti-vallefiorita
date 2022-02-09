<?php

  require_once('vendor/autoload.php');

  $loader = new \Twig\Loader\FilesystemLoader('./templates');
  $twig = new \Twig\Environment($loader);

  $includifile = './data/includifile.txt';

  if (filesize($includifile) == 0) {
    $risultati = '<p class="alert alert-warning">Non ci sono ancora risultati validi. Torna più tardi o semplicemente ricarica la pagina.</p>';
  } else {
    $risultati = file_get_contents($includifile);
  }

  echo $twig->render('risultati.twig', [
    'risultati' => $risultati,
  ]);
  ?>