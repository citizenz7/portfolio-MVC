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
    elseif($_GET['action'] == 'addProjetView') {
      addProjetView();
    }
    elseif($_GET['action'] == 'addProjetBDD') {
      addProjetBDD($_POST['projetTitre'], $_POST['projetTexte'], $_POST['projetCat'], $_POST['projetGithub']);
      //redirect to index page
      header('Location: index.php?action=adminIndex&actionP=added');
      exit;
    }
    elseif($_GET['action'] == 'editProjetView') {
      editProjetView();
    }
    elseif($_GET['action'] == 'editProjetBDD') {
      editProjetBDD($_POST['projetTitre'], $_POST['projetTexte'], $_POST['projetCat'], $_POST['projetGithub']);
      //redirect to index page
      header('Location: index.php?action=adminIndex&actionP=edited');
      exit;
    }
    elseif($_GET['action'] == 'addArticleView') {
      addArticleView();
    }
    elseif($_GET['action'] == 'addArticleBDD') {
      addArticleBDD($_POST['articleTitre'], $_POST['articleTexte']);
      //redirect to index page
      header('Location: index.php?action=adminIndex&actionA=added');
      exit;
    }
    elseif($_GET['action'] == 'adminLogin') {
      login();
    }
    elseif($_GET['action'] == 'deconnexion') {
      deconnexion();
    }

    else {
      echo 'Erreur : aucun identifiant de projet envoyé';
    }
}

else {
   index();
}
