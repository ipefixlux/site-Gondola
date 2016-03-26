<?
// recup du reste du formulaire 
include("../connex.php");
$addmod = $_GET['addmod'];
$nom_fichier_db=$_POST['fichier_db'];

$titre = trim(utf8_encode($_POST['titre']));
$texte = trim(utf8_encode($_POST['texte']));
$datein = $_POST['datepicker'];

$nomdefichier=$_FILES['imagenews']['tmp_name'];
$tailledefichier=$_FILES['imagenews']['size']; 
$extfichier= strtolower(  substr(  strrchr($_FILES['imagenews']['name'], '.')  ,1)  );
//echo $extfichier."<- ext?    " ;
//echo $titre.'<br>'.$texte.'<br><br>En date du '.$datein ;
//echo '<br><br>';

// ajout dans la db
if($addmod=="add") 
	$resultat = "INSERT INTO news SET titre='$titre', texte='$texte', datein='$datein' ";
// modifier l'enregistrement
else 
	{
		$id=$_GET["id"];
		$elemsql ="";
		$texte = addcslashes($texte,'\'');
		if($_FILES['imagenews']['tmp_name']!="")
		{
		$rq = "SELECT img FROM news WHERE id='$id' ";
		//		echo "nom du fichier dans la db : ".$nom_fichier_db;
		$fichier = '../img_serveur/'.$nom_fichier_db;
		//		echo "le fichier est la : ".$fichier;
		if( file_exists ($fichier)) 
		{
		//		echo "ok le fichier est la";
		unlink($fichier);
		}
		recup_photo($id,$nomdefichier,$tailledefichier,$extfichier);
		$nomphotoupdate=$id.".".$extfichier;
		$elemsql = "img='$nomphotoupdate',";
		}
		$resultat = "UPDATE news SET titre='$titre', texte='$texte',".$elemsql." datein='$datein' WHERE id='$id' ";
	}

if ($mysqli->query($resultat) === TRUE)
	 {
    //		echo "New record created successfully";
	} 
else 
	{
    echo "Error: " . $resultat . "<br>" . $mysqli->error;
	}

$futuridphoto=$mysqli->insert_id;
$futuridphotoext=$futuridphoto.".".$extfichier;
$resultat = "UPDATE news SET img='$futuridphotoext' where id='$futuridphoto'";
if ($mysqli->query($resultat) === TRUE) {
   //		echo "update successfully";
} else {
    echo "Error: " . $resultat . "<br>" . $mysqli->error;
}
//		printf("Le dernier ID inséré dans est le id %d.\n", $futuridphoto);
recup_photo($futuridphoto,$nomdefichier,$tailledefichier,$extfichier);

// retourne à la page de gestion
echo "<script type='text/javascript'>document.location.replace('gestion_news.php');</script>";
?>
<br>
<?
function recup_photo($futuridphoto,$nomdefichier,$tailledefichier,$extfichier)
{
$uploaddir = '../img_serveur/';
$fichier_tmp=$nomdefichier;
//		echo $fichier_tmp."   ";
$uploadfile = $uploaddir.$futuridphoto.".".$extfichier;
//		echo $uploadfile;
$resultat = move_uploaded_file($fichier_tmp,$uploadfile);

}
?>