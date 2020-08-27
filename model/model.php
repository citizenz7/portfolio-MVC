<?php

function getProjets() {
   $db = dbConnect();
   $req = $db->query('SELECT * FROM projets ORDER BY projetID DESC');

   return $req;
}

function getProjet($projetId) {
    $db = dbConnect();
    $req = $db->prepare('SELECT projetID, projetTitre, projetCat, projetTexte, projetGithub, projetDate, projetImage, projetVues FROM projets WHERE projetID = ?');
    $req->execute(array($projetId));
    $proj = $req->fetch();

    return $proj;
}

function getArticles() {
   $db = dbConnect();
   $arts = $db->query('SELECT * FROM articles ORDER BY articleID DESC');

   return $arts;
}

function getArticle($articleId) {
    $db = dbConnect();
    $req = $db->prepare('SELECT articleID, articleTitre, articleTexte, articleDate, articleImage, articleVues FROM articles WHERE articleID = ?');
    $req->execute(array($articleId));
    $art = $req->fetch();

    return $art;
}

function getApropos() {
    $db = dbConnect();
    $apropos = $db->query('SELECT username, apropos FROM membres WHERE memberID = 1');

    return $apropos;
}

function getProjetArchivesDate() {
  $db = dbConnect();
  $projArchDate = $db->query("SELECT Month(projetDate) as Month, Year(projetDate) as Year FROM projets GROUP BY Month(projetDate), Year(projetDate) ORDER BY projetDate DESC");

  return $projArchDate;
}


function dbConnect() {
    try {
      $db = new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 'portfolio', 'ujdx645a');
      return $db;
    }
    catch(Exception $e) {
      die('Erreur : '.$e->getMessage());
    }
}

function html($string) {
    //return htmlspecialchars($string, REPLACE_FLAGS, CHARSET);
    return htmlspecialchars($string, ENT_COMPAT, 'UTF-8', true);
}





//-----------------------------------------------------
//Paramètres du site
//-----------------------------------------------------
define('SITENAME','Portfolio');
define('SITENAMELONG','Portfolio d\'Olivier Prieur');
//define('WEBPATH','/var/www/'.SITENAMELONG.'/web/'); //Chemin complet pour les fichiers du site
define('SITESLOGAN','Je suis un dev...');
define('SITEDESCRIPTION','Portfolio d\'Olivier Prieur');
define('SITEKEYWORDS','Nevers,'.SITENAME.',libre,free,opensource,gnu,téléchargement,download,upload,xbt,tracker,php,mysql,linux,bsd,os,système,system,exploitation,debian,arch,fedora,ubuntu,manjaro,mint,film,movie,picture,video,mp3,musique,music,mkv,avi,mpeg,gpl,creativecommons,cc,mit,apache,cecill,artlibre');
//define('SITEURL','http://www.'.SITENAMELONG);
//define('SITEURLHTTPS','https://www.'.SITENAMELONG);
define('SITEOWNORNAME','Olivier Prieur');
define('SITEAUTOR','citizenz7');
define('SITEOWNORADDRESS','57 rue de Marzy 58000 Nevers');
define('SITEVERSION','1.0.1');
define('SITEDATE','10/07/20');
define('COPYDATE','2020');
define('CHARSET','UTF-8');

//-----------------------------------------------------
//MAIL
//-----------------------------------------------------
define('SITEMAIL','contact@olivierprieur.fr');
define('SITEMAILPASSWORD','7T=u82VPzp!f8Ns2mS');
define('SMTPHOST','mail.s2ii.xyz');
define('SMTPPORT','587');



//-----------------------------------------------------
//FUNCTIONS
//-----------------------------------------------------
//load classes as needed
// function my_autoloader($class) {
//
//    $class = strtolower($class);
//
//    //if call from within assets adjust the path
//    $classpath = './view/classes/class.'.$class . '.php';
//    if (file_exists($classpath)) {
//       require_once $classpath;
//    }
//
// }
//
// spl_autoload_register('my_autoloader');
//
// $user = new User($db);


// ---------------------------------------------------------------------
//  Date en français
// ---------------------------------------------------------------------
function date_fr($format, $timestamp=false) {
	if (!$timestamp) $date_en = date($format);
	else $date_en = date($format,$timestamp);

	$texte_en = array(
		"Monday", "Tuesday", "Wednesday", "Thursday",
		"Friday", "Saturday", "Sunday", "January",
		"February", "March", "April", "May",
		"June", "July", "August", "September",
		"October", "November", "December"
	);
	$texte_fr = array(
		"lundi", "mardi", "mercredi", "jeudi",
		"vendredi", "samedi", "dimanche", "janvier",
		"f&eacute;vrier", "mars", "avril", "mai",
		"juin", "juillet", "ao&ucirc;t", "septembre",
		"octobre", "novembre", "d&eacute;cembre"
	);
	$date_fr = str_replace($texte_en, $texte_fr, $date_en);

	$texte_en = array(
		"Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun",
		"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
		"Aug", "Sep", "Oct", "Nov", "Dec"
	);
	$texte_fr = array(
		"Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim",
		"Jan", "F&eacute;v", "Mar", "Avr", "Mai", "Jui",
		"Jui", "Ao&ucirc;", "Sep", "Oct", "Nov", "D&eacute;c"
	);
	$date_fr = str_replace($texte_en, $texte_fr, $date_fr);

	return $date_fr;
}


// ---------------------------------------------------------------------
//  Générer un mot de passe aléatoire
// ---------------------------------------------------------------------
function fct_passwd( $chrs = "")
{
   if( $chrs == "" ) $chrs = 10;
   $chaine = "";

   $list = "123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghkmnpqrstuvwxyz!=$";
   mt_srand((double)microtime()*1000000);
   $newstring="";

   while( strlen( $newstring )< $chrs ) {
   $newstring .= $list[mt_rand(0, strlen($list)-1)];
   }
   return $newstring;
 }
