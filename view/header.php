<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Mon super portfolio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="apple-touch-icon" sizes="57x57" href="view/img/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="view/img/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="view/img/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="view/img/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="view/img/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="view/img/./public/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="view/img/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="view/img/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="view/img/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="view/img/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="view/img/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="view/img/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="view/img/icons/favicon-16x16.png">
  <link rel="manifest" href="view/img/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="view/img/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Olivier Prieur">
  <meta name="description" content="Mon syper portfolio">
  <meta name="keywords" content="portfolio,olivier,prieur,acs,web">
  <link rel="stylesheet" href="view/css/normalize.css">
  <link rel="stylesheet" href="view/css/style.css">
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: "textarea",
      plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>

</head>

<body id="tothetop">

  <div class="hero-image">
    <div class="menu">
      <p><a class="text-decoration-none text-white" href="./">< Accueil /></a</p>
      <p><a class="text-decoration-none text-white" href="index.php#projets">< Projets /></a></p>
      <p><a class="text-decoration-none text-white" href="index.php#articles">< Articles /></a></p>
      <p><a class="text-decoration-none text-white" href="index.php#apropos">< A propos /></a></p>
      <p><a class="text-decoration-none text-white" href="contact.php">< Contact /></a></p>
      <p><a class="text-decoration-none text-white" href="index.php#archives">< Archives /></a></p>
      <p><a class="text-decoration-none text-white" href="recherche.php">< Recherche /></a></p>
    </div>
    <div class="menu__toggler"><span></span></div>
    <script >
      const toggler = document.querySelector('.menu__toggler');
      const menu = document.querySelector('.menu');
      toggler.addEventListener('click', () => {
        toggler.classList.toggle('active');
        menu.classList.toggle('active');
      });
      </script>
      <div class="hero-text">
        <div class="type-writer-text pb-2">
          Je suis un <span class="barre">Dave</span> <i class="fas fa-music barre"></i> ... dev !
        </div>
        <h1>< Olivier Prieur /></h1>
        <p class="title1">Développeur web et web mobile</p>
      </div>
    </div>
