<?php
ob_start();

//if not logged in redirect to login page
// if(!$user->is_logged_in()){
//   header('Location: index.php?action=adminLogin');
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
            // $target = "view/img/projets/" . $_FILES['projetImage']['name'];
		        // $path = '../'.$target;

            $_POST = array_map( 'stripslashes', $_POST );

            //collect form data
            extract($_POST);

            //very basic validation
            if($projetTitre ==''){
              $error[] = 'Veuillez entrer un titre.';
            }

            if($projetTexte ==''){
              $error[] = 'Veuillez entrer un texte';
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

              // try {
              //
              //   //insert into database
              //   $stmt = $db->prepare('INSERT INTO projets (projetTitre, projetTexte, projetCat, projetDate, projetVues) VALUES (:projetTitre, :projetTexte, :projetCat, :projetDate, :projetVues)') ;
              //   $stmt->execute(array(
              //     ':projetTitre' => $projetTitre,
              //     ':projetTexte' => $projetTexte,
              //     ':projetCat' => $projetCat,
              //     ':projetDate' => date('Y-m-d H:i:s'),
              //     ':projetVues' => '1'
              //   ));
              //
              //   $projetID = $db->lastInsertId();
              //
              //   if(isset($_FILES['projetImage']['name']) && !empty($_FILES['projetImage']['name'])) {
	            // 	    $stmt = $db->prepare('UPDATE projets SET projetImage = :projetImage WHERE projetID = :projetID') ;
		          //       $stmt->execute(array(
		          //            ':projetID' => $projetID,
		          //            ':projetImage' => $target
		          //       ));
	        	  //   }
              //
              //   //redirect to index page
              //   header('Location: index.php?actionP=added');
              //   exit;
              // }
              //
              // catch(PDOException $e) {
              //   echo $e->getMessage();
              // }


            if(isset($error)){
              foreach($error as $error){
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
              }
            }
          }
          ?>

          <?php
          //include('menu.php');
          ?>

          <div class="pt-3"><h2>Ajouter un projet</h2></div>

          <form action='index.php?action=addProjetBDD' method='post' enctype="multipart/form-data">
             <div class="form-group">
               <label for="projetTitre">Titre</label>
               <input type="text" name="projetTitre" class="form-control" id="projetTitre" value='<?php if(isset($error)){ echo $_POST['projetTitre']; } ?>'>
             </div>
             <div class="form-group">
               <label for="ProjetTexte">Contenu</label>
               <textarea name="projetTexte" class="form-control" id="ProjetTexte" rows="10"><?php if(isset($error)){ echo $_POST['projetTexte']; } ?></textarea>
             </div>
             <div class="form-group">
               <label for="ProjetImage">Image <small>(images jpeg ou png seulement)</small></label>
               <input type="file" name="projetImage" class="form-control">
             </div>
             <div class="form-group">
               	<label for="projetCat">Catégorie du projet</label>
	       	      <!--<input type="text" name="projetCat" class="form-control" id="projetCat" value='<?php if(isset($error)){ echo $_POST['projetCat']; } ?>'>-->
		            <select class="form-control" id="projetCat" name="projetCat">
    			           <option>HTML-CSS</option>
    			           <option>PHP-SQL</option>
    			           <option>JS</option>
  		          </select>
             </div>
             <div class="form-group">
               <label for="projetGithub">URL Github du projet</label>
               <input type="text" name="projetGithub" class="form-control" id="projetGithub" value='<?php if(isset($error)){ echo $_POST['projetGithub']; } ?>'>
             </div>
		         <div class="text-right pt-5">
			            <button type='reset' class="btn btn-secondary">Annuler</button> <button type='submit' class="btn btn-primary" name='submit'>Ajouter</button>
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
