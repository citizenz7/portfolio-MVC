<?php

require('./model/model.php');

function index() {
    $projs = getProjets();
    $arts = getArticles();
    $apropos = getApropos();
    $projArchDate = getProjetArchivesDate();
    require('./view/indexView.php');
}

function projet() {
  if (isset($_GET['projetID']) && $_GET['projetID'] > 0) {
    $proj = getProjet($_GET['projetID']);
    require('./view/projetView.php');
  }
  else {
      echo 'Erreur : aucun identifiant de projet envoyé';
  }
}

function article() {
  if (isset($_GET['articleID']) && $_GET['articleID'] > 0) {
    $art = getArticle($_GET['articleID']);
    require('./view/articleView.php');
  }
  else {
      echo 'Erreur : aucun identifiant d\'article envoyé';
  }
}

function ProjetArchivesDate() {
  require('./view/archivesView.php');
}

function contact() {
  require('./view/contactView.php');
}
