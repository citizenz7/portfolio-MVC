<?php
ob_start();
?>

<div id="projets" class="container-fluid">
  <div class="container pb-3 mb-1 border">
    <div class="pb-3">
      <h2 class="text-center">Projets / Portfolio</h2>
    </div>

    <div class="text-center">
	     <a class="btn btn-sm btn-dark" href="index.php#projets" role="button">Tous</a>
	     <a class="btn btn-sm btn-primary" href="index.php?cat=HTML-CSS#projets" role="button">HTML-CSS</a>
	     <a class="btn btn-sm btn-success" href="index.php?cat=PHP-SQL#projets" role="button">PHP-SQL</a>
	     <a class="btn btn-sm btn-warning" href="index.php?cat=JS#projets" role="button">Javascript</a>
    </div>

    <div class="row row-cols-1 row-cols-md-3">

        <?php
        while($row = $projs->fetch()) {
	      ?>

        <div class="col mt-4 mb-4">
          <div class="card h-100">
            <img class="img-fluid card-img-top image2" src="view/<?php echo html($row['projetImage']); ?>" alt="<?php echo html($row['projetTitre']); ?>">

	            <div class="card-body texte-projet">

		              <?php
		              if($row['projetCat'] == "HTML-CSS") {
			              echo '<button class="btn btn-primary btn-sm btn-block">';
			              echo html($row['projetCat']);
			              echo '</button>';
		              }
		              elseif($row['projetCat'] == "PHP-SQL") {
			              echo '<button class="btn btn-success btn-sm btn-block">';
                    echo html($row['projetCat']);
                    echo '</button>';
		              }
		              elseif($row['projetCat'] == "JS") {
                    echo '<button class="btn btn-warning btn-sm btn-block">';
                    echo html($row['projetCat']);
                    echo '</button>';
                  }
		              ?>

            	    <h5 class="card-title titre-projet pt-2"><a href="index.php?action=projet&projetID=<?php echo html($row['projetID']); ?>"><?php echo html($row['projetTitre']); ?></a></h5>
            	    <p class="card-text texte-projet">
              	<?php
                $max = 150;
                $chaine = $row['projetTexte'];
                if (strlen($chaine) >= $max) {
	                 $chaine = substr($chaine, 0, $max);
	                 $espace = strrpos($chaine, " ");
	                 $chaine = substr($chaine, 0, $espace).' ...';
                }
                echo nl2br($chaine);
                ?>
		            </p>
	           </div>
	           <div class="card-footer">
		             <small class="text-muted tinytext">
			                <i class="far fa-calendar-alt"></i> Publié le : <?php echo html($row['projetDate']); ?>
			                <p class="mb-1"><i class="fas fa-tag"></i> Catégorie : <?php echo html($row['projetCat']); ?></p>
			                <p class="mb-1"><i class="fas fa-eye"></i> Lectures : <?php echo html($row['projetVues']); ?></p>
		             </small>
            </div>
          </div>
        </div>

        <?php
      }//while

      ?>
      </div><!-- END GRID -->

      <!-- Pagination -->
      <!-- <div class="row justify-content-center ">
        <div class="col-md-3 col-md-offset-4"> -->
	<?php
	//echo $pages->page_links();
	?>
        <!-- </div>
      </div> -->

    </div><!-- //container -->
  </div><!-- //container-fluid -->


  <div id="articles" class="container-fluid bg-dark">
    <div class="container mt-4">
      <div class="row">
        <div class="col text-center pt-4 pb-4">
          <h2 class="text-white">Articles</h2>

          <?php
          // try {
          //   //Pagination : on instancie la class
          //   $pages = new Paginator('1','art');
          //
          //   //on collecte tous les enregistrements de la fonction
          //   $stmt = $db->query('SELECT articleID FROM articles');
          //
          //   //On détermine le nombre total d'enregistrements
          //   $pages->set_total($stmt->rowCount());
          //
          //   $stmt = $db->query('SELECT articleID, articleTitre, articleTexte, articleDate, articleImage, articleVues FROM articles ORDER BY articleID DESC ' .$pages->get_limit());
          //
          //   while($row = $stmt->fetch()){
          ?>

          <?php
          while($row = $arts->fetch()) {
  	      ?>

            <div class="card mb-4">
              <div class="card-body">
                <h4 class="card-title titre-article"><a href="index.php?action=article&articleID=<?php echo html($row['articleID']); ?>"><?php echo html($row['articleTitre']); ?></a></h4>
                <p>
                  <img class="img-fluid img-article float-xl-left" src="view/<?php echo html($row['articleImage']); ?>" alt="<?php echo html($row['articleTitre']); ?>">
                  <?php
                    $max = 900;
                    $chaine = $row['articleTexte'];
                    if (strlen($chaine) >= $max) {
    	                 $chaine = substr($chaine, 0, $max);
    	                 $espace = strrpos($chaine, " ");
    	                 $chaine = substr($chaine, 0, $espace).'... <p class="text-right pt-4"><i class="fas fa-angle-double-right"></i> <a href="index.php?action=article&articleID=' . html($row['articleID']) . '">Lire la suite</a></p>';
                    }
                    echo '<div class="texte-article">' . nl2br($chaine) . '</div>';
                    ?>
                </p>
              </div>
              <div class="card-footer text-center">
                <small class="text-muted smalltext">
                  <i class="far fa-calendar-alt"></i> Publié le : <?php echo $row['articleDate']; ?> | Lectures : <?php echo html($row['articleVues']); ?>
                </small>
              </div>
            </div>

          <?php
        }//while

        // }
        // catch(PDOException $e) {
        //   echo $e->getMessage();
        // }
        ?>

        <!-- <div class="row justify-content-center">
          <div class="col-sm-4">
            <?php //echo $pages->page_links(); ?>
          </div>
        </div> -->

        </div>

        </div>
      </div>
    </div>
  </div>


  <div id="apropos2" class="container-fluid">
    <div id="apropos" class="container">
      <div class="row">
        <div class="col pt-4 pb-4">
          <div class="text-center text-white">
            <h2>A propos...</h2>
          </div>
          <div class="text-white apropostext px-5 py-5 text-justify rounded">

            <?php
            while($row = $apropos->fetch()) {
    	      ?>

            <img src="view/img/citizenz2.png" class="mx-auto d-block mr-xl-4 img-fluid img-thumbnail rounded-circle float-xl-left photo" alt="<?php echo html($row['username']); ?>">
            <?php echo $row['apropos']; ?>
          </div>

          <div class="text-center text-white pt-5">
            <h4>Mes projets et sites web</h4>
          </div>

          <div class="card-deck">
            <div class="card">
              <a href="https://www.citizenz.info" target="_blank"><img src="view/img/citizenzinfo.jpg" class="img-fluid card-img-top" alt="citizenz.info"></a>
              <div class="card-body">
                <h5 class="card-title titre-projet">citizenz.info <i class="fas fa-link"></i></h5>
                <p class="card-text texte-projet">Blog Geek & Libre : tutoriels web, serveurs et desktop, actualités du monde du Libre, Gnu/linux, xBSD, etc.</p>
              </div>
            </div>
            <div class="card">
              <a href="https://www.ft4a.fr" target="_blank"><img src="view/img/ft4afr.jpg" class="img-fluid card-img-top" alt="fr4a.fr"></a>
              <div class="card-body">
                <h5 class="card-title titre-projet">ft4a.fr <i class="fas fa-link"></i></h5>
                <p class="card-text texte-projet">Tracker bittorrent exclusivement réservé aux médias sous licence libre ou licence de libre diffusion.</p>
              </div>
            </div>
            <div class="card">
              <a href="https://www.pengolincoin.xyz" target="_blank"><img src="view/img/pengolincoinxyz.jpg" class="img-fluid card-img-top" alt="pengolincoin.xyz"></a>
              <div class="card-body">
                <h5 class="card-title titre-projet">Pengolincoin <i class="fas fa-link"></i></h5>
                <p class="card-text texte-projet">Projet de cryptomonnaie généraliste, populaire et écologique.</p>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-4 bg-light">
    <div id="archives" class="container">

      <div class="row">
	<div class="col-sm-6">
	 <div class="card">
	 <div class="card-body text-center">
            <h5 class="card-title">Me contacter</h5>
	    <p class="card-text">Merci d'utiliser le formulaire de contact pour m'envoyer un message. J'y répondrai dès que possible.</p>
	    <a href="index.php?action=contact" class="btn btn-primary">Me contacter</a>
	</div>
        </div>
       </div>
       <div class="col-sm-6">
	<div class="card">
	 <div class="card-body text-center">
      <h5 class="card-title">Archives des projets</h5>
	    <p class="card-text">
	    Vous trouverez ci-dessous les archives de mes projets réalisés dans le cadre de l'Access Code School, classées par mois et années
        <select onchange="document.location.href = this.value" class="custom-select custom-select-sm smalltext mt-4">
		        <option selected>Mois - années</option>
		        <?php
		        // $stmt = $db->query("SELECT Month(projetDate) as Month, Year(projetDate) as Year FROM projets GROUP BY Month(projetDate), Year(projetDate) ORDER BY projetDate DESC");
		        while($row = $projArchDate->fetch()){
			           $monthName = date_fr("F", mktime(0, 0, 0, html($row['Month']), 10));
			           $year = date_fr(html($row['Year']));
			           echo "<option value='index.php?action=archive&month=" . html($row['Month']) . "&year=" . html($row['Year']) . "'>" . html($monthName) . "-" . html($row['Year']) . "</option>";
		        }
		        ?>
	     </select>
	   </p>
	  </div>
	</div>
	</div>

      </div>
    </div>
  </div>

  <?php
    $projs->closeCursor();
    $content = ob_get_clean();
  ?>

<?php require('template.php'); ?>
