<?php
ob_start();

//if not logged in redirect to login page
// if(!$user->is_logged_in()){
//   header('Location: login.php');
// }
?>

  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 px-5 text-justify">
        <div class="pb-5">

	<?php
	//if form has been submitted process it
	if(isset($_POST['submit'])){

    // location where initial upload will be moved to
    // $target = "img/projets/" . $_FILES['projetImage']['name'];
    // $path = '../'.$target;

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($projetID ==''){
			$error[] = 'This post is missing a valid id!.';
		}

		if($projetTitre ==''){
			$error[] = 'Please enter the title.';
		}

		if($projetTexte ==''){
			$error[] = 'Please enter the content.';
		}

    if($projetCat ==''){
      $error[] = 'Veuillez entrer une ou plusieurs catégories';
    }


    // if(isset($_FILES['projetImage'])){
    //    // find thevtype of image
    //     switch ($_FILES["projetImage"]["type"]) {
    //        case $_FILES["projetImage"]["type"] == "image/jpeg":
    //           move_uploaded_file($_FILES["projetImage"]["tmp_name"], $path);
    //           break;
    //        case $_FILES["projetImage"]["type"] == "image/pjpeg":
    //           move_uploaded_file($_FILES["projetImage"]["tmp_name"], $path);
    //           break;
    //        case $_FILES["projetImage"]["type"] == "image/png":
    //           move_uploaded_file($_FILES["projetImage"]["tmp_name"], $path);
    //           break;
    //        case $_FILES["projetImage"]["type"] == "image/x-png":
    //           move_uploaded_file($_FILES["projetImage"]["tmp_name"], $path);
    //           break;
		//
    //        default:
    //           $error[] = 'Mauvais type d\'image. Seules les JPG et les PNG sont acceptées !.';
    //    }
    //  }

		// if(!isset($error)) {
		//
		// 	try {
		//
		// 		//insert into database
		// 		$stmt = $db->prepare('UPDATE projets SET projetTitre = :projetTitre, projetTexte = :projetTexte, projetCat = :projetCat, projetDate = :projetDate, projetVues = :projetVues
    //       WHERE projetID = :projetID');
		// 		$stmt->execute(array(
		// 			':projetTitre' => $projetTitre,
		// 			':projetTexte' => $projetTexte,
    //       ':projetCat' => $projetCat,
    //       ':projetDate' => date('Y-m-d H:i:s'),
    //       ':projetVues' => '1',
    //       ':projetID' => $projetID
		// 		));
		//
    //     if(isset($_FILES['projetImage']['name']) && !empty($_FILES['projetImage']['name'])) {
	  //        $stmt = $db->prepare('UPDATE projets SET projetImage = :projetImage WHERE projetID = :projetID');
    //        $stmt->execute(array(
    //         ':projetImage' => $target,
    //         ':projetID' => $projetID
    //        ));
    //     }
		//
		// 		//redirect to index page
		// 		header('Location: index.php?actionP=updated');
		// 		exit;
		//
		// 	} catch(PDOException $e) {
		// 	    echo $e->getMessage();
		// 	}
		//
		// }// if isset error

	}//isset post submit

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
		}
	}

		// try {
    //
		// 	$stmt = $db->prepare('SELECT projetID, projetTitre, projetTexte, projetCat, projetImage FROM projets WHERE projetID = :projetID') ;
		// 	$stmt->execute(array(':projetID' => $_GET['id']));
		// 	$row = $stmt->fetch();
    //
		// } catch(PDOException $e) {
		//     echo $e->getMessage();
		// }

	?>

  <?php
  //include('menu.php');
  ?>

  <div class="pt-3"><h3>Editer le projet : "<?php echo $row['projetTitre']; ?>"</h3></div>

  <form action="" method="post" enctype="multipart/form-data">
    <input type='hidden' name='projetID' value='<?php echo $row['projetID'];?>'>
     <div class="form-group">
       <label for="projetTitre">Titre</label>
       <input type="text" name="projetTitre" class="form-control" id="projetTitre" value="<?php echo html($row['projetTitre']); ?>">
     </div>
     <div class="form-group">
       <label for="ProjetTexte">Contenu</label>
       <textarea name="projetTexte" class="form-control" id="ProjetTexte" rows="10"><?php echo html($row['projetTexte']); ?></textarea>
     </div>

     <div class="form-group">
       <label for="ProjetImage">Image <small>(images jpeg ou png seulement)</small></label><br>
       <?php
       if(!empty($row['projetImage']) && file_exists("../" . $row['projetImage'])) {
         echo '<img class="img-thumbnail" style="max-width: 150px;" src="../'.html($row['projetImage']).'" alt="Image de présentation de '.html($row['projetTitre']).'" />';
       ?>
       <a href="javascript:delimageProj('<?php echo html($row['projetID']);?>','<?php echo html($row['projetImage']);?>')">Supprimer l'image</a>
       <?php
				}
				else {
					echo 'Pas d\'image pour <i><b>'.html($row['projetTitre']) . '</b></i>';
				}
				?>
        <br>
        <input type="file" name="projetImage" class="form-control">

     </div>

     <div class="form-group">
       	<label for="projetCat">Catégorie du projet</label>
       	<!--<input type="text" name="projetCat" class="form-control" id="projetCat" value="<?php echo $row['projetCat']; ?>">-->
	<select class="form-control" id="projetCat" name="projetCat">
        	<option>HTML-CSS</option>
        	<option>PHP-SQL</option>
        	<option>JS</option>
    	</select>
     </div>

      <div class="text-right pt-5">
	<button type='reset' class="btn btn-secondary">Annuler</button>	<button type='submit' class="btn btn-primary" name='submit'>Editer le projet</button>
      </div>
  </form>

</div>
</div>
</div>
</div>



<?php
//$proj->closeCursor();
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>
