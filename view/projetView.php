
<?php
ob_start();
?>

<?php
// $id = html($_GET['id']);
//
// // on met à jour le nb de vues de l'article
// $stmt2 = $db->query('UPDATE projets SET projetVues = projetVues+1 WHERE projetID = '.$id);
//
// $stmt = $db->prepare('SELECT projetID, projetTitre, projetTexte, projetGithub, projetDate, projetCat, projetImage, projetVues FROM projets WHERE projetID = :projetID');
// $stmt->execute(array(':projetID' => $id));
// $proj = $stmt->fetch();
//
// if($proj['projetID'] == ''){
//     header('Location: ./');
//     exit;
// }
?>

  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-sm-12 px-3 py-3 text-justify border">
        <div class="pb-3">
          <h2 class="titre-projet"><?php echo htmlspecialchars($proj['projetTitre']); ?></h2>
          <p class="text-muted">
            <i class="far fa-calendar-alt"></i> Publié le : <?php echo $proj['projetDate']; ?> |
            <i class="fas fa-tag"></i> Catégorie : <?php echo htmlspecialchars($proj['projetCat']); ?> |
            <i class="fas fa-eye"></i> Lectures : <?php echo htmlspecialchars($proj['projetVues']); ?>
          </p>
        </div>

        <div class="mb-5">
          <img style="max-height:100px;" class="img-fluid img-thumbnail float-left mr-3" src="view/<?php echo htmlspecialchars($proj['projetImage']); ?>" alt="<?php htmlspecialchars($proj['projetTitre']); ?>">
            <?php echo $proj['projetTexte']; ?>

            <?php
            if(!empty($proj['projetGithub'])) {
            ?>

            <a class="text-dark" href="<?php echo htmlspecialchars($proj['projetGithub']); ?>" target="_blank"><i class="fab fa-github fa-2x"></i> <?php echo htmlspecialchars($proj['projetGithub']); ?></a>
            <?php
            }
            ?>
        </div>
<hr>

<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://portfolio-shh9xt0mnz.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</div><!-- col -->
</div><!-- // row -->

</div><!-- //container -->

<?php
//$proj->closeCursor();
$content = ob_get_clean();
?>


<?php require('template.php'); ?>
