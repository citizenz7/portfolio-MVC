<?php
session_start();

require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'index') {
      index();
    }
    elseif ($_GET['action'] == 'projet') {
      projet();
    }
    elseif ($_GET['action'] == 'article') {
      article();
    }
    elseif ($_GET['action'] == 'contact') {
      contact();
    }
    elseif ($_GET['action'] == 'archive') {
      archive();
    }
    elseif ($_GET['action'] == 'recherche') {
      recherche();
    }
    elseif($_GET['action'] == 'adminIndex') {
      adminIndex();
    }

    else {
      echo 'Erreur : aucun identifiant de projet envoyé';
    }
}

else {
   index();
}
