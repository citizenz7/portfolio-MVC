<?php
ob_start();
?>

<?php
//Si on supprime l'image du projet...
		// if(isset($_GET['delprojet'])) {
		// 	$delimage = $_GET['delprojet'];
		// 	//on supprime le fichier image
		// 	$stmt = $db->prepare('SELECT projetImage FROM projets WHERE projetID = :projetID');
		// 	$stmt->execute(array(
		// 		':projetID' => $delimage
		// 	));
		// 	$sup = $stmt->fetch();
		// 	$file = "../" . $sup['projetImage'];
		// 	if (file_exists($file)) {
		// 		unlink($file);
		// 	}
			//puis on supprime l'image dans la base
			// $stmt = $db->prepare('UPDATE projets SET projetImage = NULL WHERE projetID = :projetID');
			// $stmt->execute(array(
      //   ':projetID' => $delimage
      // ));
			// header('Location: edit-projet.php?id='.$delimage);
		//}
?>

<!-- Projets -->
  <div class="container pt-3 pb-3">
    <div class="row">
      <div class="col-sm-12 px-5 text-justify">
        <div class="pb-2">
          <div class="text-center mb-4 alert alert-primary" role="alert">Bienvenue <b><?php echo $_SESSION['username']; ?></b> ! Vous êtes connecté. <a href="index.php?action=deconnexion">Déconnexion</a></div>

	  <?php
	  if(isset($_GET['actionA']) && $_GET['actionA'] == "updated"){
      echo '
        <div class="alert alert-info alert-dismissible fade show text-center font-weight-bold mt-4" role="alert">
          Article mis à jour !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ';
    }

    if(isset($_GET['actionP']) && $_GET['actionP'] == "updated"){
      echo '
        <div class="alert alert-info alert-dismissible fade show text-center font-weight-bold mt-4" role="alert">
          Projet mis à jour !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ';
    }

    if(isset($_GET['actionP']) && $_GET['actionP'] == "added"){
      echo '
        <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold mt-4" role="alert">
          Projet ajouté !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ';
    }

    if(isset($_GET['actionA']) && $_GET['actionA'] == "added"){
      echo '
        <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold mt-4" role="alert">
          Article ajouté !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ';
    }
	  ?>



          <?php //include('menuAdminView.php');?>

            <table class="table table-responsive-sm">
              <tr>
                <td><span id="projets" class="lead font-weight-bold">Projets</span></td>
                <td class="text-right"><a href="index.php?action=addProjetView" class="mx-auto"><button type="button" class="btn btn-success btn-sm">Ajouter un projet</button></a></td>
              </tr>
            </table>

	  <table class="table table-sm table-hover table-responsive-sm">
	    <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th width="70%">Titre</th>
              <th>Date d'ajout</th>
              <th class="text-center">Action</th>
	    </tr>
	    </thead>
	    <tbody>
              <?php
              //try {
                // //Pagination : on instancie la class
                // $pages = new Paginator('4','proj');
                //
                // //on collecte tous les enregistrements de la fonction
                // $stmt = $db->query('SELECT projetID FROM projets');
                //
                // //On détermine le nombre total d'enregistrements
                // $pages->set_total($stmt->rowCount());
                //
                // $stmt = $db->query('SELECT projetID, projetTitre, projetDate FROM projets ORDER BY projetID DESC ' .$pages->get_limit());
                while($row = $adminProjs->fetch()){
                  echo '<tr>';
                  echo '<td>'.$row['projetID'].'</td>';
                  echo '<td>'.$row['projetTitre'].'</td>';
                  echo '<td class="small">'.date_fr('d-m-Y à H:i:s', strtotime(($row['projetDate']))).'</td>';
                  ?>
                  <td class="text-center">
                    <a class="btn btn-primary btn-sm tinytext" role="button" aria-pressed="true" title="Editer le projets" href="edit-projet.php?id=<?php echo $row['projetID'];?>">Editer</a> |
                    <a class="btn btn-danger btn-sm tinytext" role="button" aria-pressed="true" title="Supprimer le projet" href="javascript:delprojet('<?php echo $row['projetID'];?>','<?php echo $row['projetTitre'];?>')">Suppr.</a>
                  </td>
                  <?php
                  echo '</tr>';
                }//while

              //}
              // catch(PDOException $e) {
              //   echo $e->getMessage();
              // }
	      ?>
	    </tbody>
            </table>

            <!-- Delete in SQL -->
            <?php
            // if(isset($_GET['delprojet'])) {
            //   $stmt = $db->prepare('DELETE FROM projets WHERE projetID = :projetID') ;
            //   $stmt->execute(array(':projetID' => $_GET['delprojet']));
            //
            //   header('Location: index.php?action=deleted');
            //   exit;
            // }
            //
            // if(isset($_GET['actionP']) && $_GET['actionP'] == "deleted"){
            //   echo '
            //   <div class="alert alert-info alert-dismissible fade show text-center font-weight-bold mt-4" role="alert">
            //     Projet supprimé !
            //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //       <span aria-hidden="true">&times;</span>
            //     </button>
            //   </div>
            //   ';
            // }
            ?>

      </div>
      <!-- Pagination -->
      <!-- <div class="row justify-content-center">
        <div class="col-4">
          <?php //echo $pages->page_links(); ?>
        </div>
      </div> -->
    </div>
  </div>
</div>


<!-- Articles -->
<div class="container pb-5">
  <div class="row">
    <div class="col-sm-12 px-5 text-justify">
      <div class="pb-2">

          <table class="table table-responsive-sm">
            <tr>
              <td><span id="articles" class="lead font-weight-bold">Articles</span></td>
              <td class="text-right"><a href="index.php?action=addArticleView" class="mx-auto"><button type="button" class="btn btn-success btn-sm">Ajouter un article</button></a></td>
            </tr>
          </table>

	<table class="table table-sm table-hover table-responsive-sm">
	  <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th width="70%">Titre</th>
            <th>Date d'ajout</th>
            <th class="text-center">Action</th>
          </tr>
	  </thead>
	  <tbody>
            <?php
            // try {
            //   //Pagination : on instancie la class
            //   $pages = new Paginator('4','art');
            //
            //   //on collecte tous les enregistrements de la fonction
            //   $stmt = $db->query('SELECT articleID FROM articles');
            //
            //   //On détermine le nombre total d'enregistrements
            //   $pages->set_total($stmt->rowCount());
            //
            //   $stmt = $db->query('SELECT articleID, articleTitre, articleDate FROM articles ORDER BY articleID DESC ' .$pages->get_limit());
            while($row = $adminArts->fetch()){

            echo '<tr>';
            echo '<td>'.$row['articleID'].'</td>';
            echo '<td>'.$row['articleTitre'].'</td>';
            echo '<td class="small">'.date_fr('d-m-Y à H:i:s', strtotime(($row['articleDate']))).'</td>';
            ?>
            <td class="text-center">
              <a class="btn btn-primary btn-sm tinytext" role="button" aria-pressed="true" title="Editer le projets" href="edit-article.php?id=<?php //echo $row['articleID'];?>">Editer</a> |
              <a class="btn btn-danger btn-sm tinytext" role="button" aria-pressed="true" title="Supprimer l'article'" href="javascript:delarticle('<?php //echo $row['articleID'];?>','<?php //echo $row['articleTitre'];?>')">Suppr.</a>
            </td>
            <?php
            echo '</tr>';
            }
            //
            // }
            // catch(PDOException $e) {
            //   echo $e->getMessage();
            // }
	    ?>
	  </tbody>
          </table>


          <?php
          // if(isset($_GET['delarticle'])) {
          //   $stmt = $db->prepare('DELETE FROM articles WHERE articleID = :articleID') ;
          //   $stmt->execute(array(':articleID' => $_GET['delarticle']));
          //
          //   header('Location: index.php?actionA=deleted');
          //   exit;
          // }
          //
          // if(isset($_GET['actionA']) && $_GET['actionA'] == "deleted"){
          //   echo '
          //   <div class="alert alert-info alert-dismissible fade show text-center font-weight-bold mt-4" role="alert">
          //     Article supprimé !
          //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          //       <span aria-hidden="true">&times;</span>
          //     </button>
          //   </div>
          //   ';
          // }
          ?>

    </div>

    <div class="row justify-content-center">
      <div class="col-4 pb-5 mb-5">
        <?php //echo $pages->page_links(); ?>
      </div>
    </div>
  </div>
</div>
</div> -->


<?php
  //$projs->closeCursor();
  $content = ob_get_clean();
?>

<?php require('view/template.php'); ?>
