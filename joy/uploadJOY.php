<?
// recup du reste du formulaire 
include("../connex.php");
$titre = trim(utf8_encode($_POST['titre']));
$texte = trim(utf8_encode($_POST['texte']));
$datein = $_POST['datepicker'];

echo $titre.'<br>'.$texte.'<br><br>En date du '.$datein ;
echo '<br><br>';
$resultat = "INSERT INTO news SET titre='$titre', texte='$texte', datein='$datein'";

if ($mysqli->query($resultat) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $resultat . "<br>" . $mysqli->error;
}
$futuridphoto=$mysqli->insert_id;
printf("Le dernier ID inséré dans est le id %d.\n", $futuridphoto);
$nomdefichier=$_FILES['imagenews']['name'];
$tailledefichier=$_FILES['imagenews']['size']; 
$extfichier= strtolower(  substr(  strrchr($_FILES['imagenews']['name'], '.')  ,1)  );
echo $extfichier."    " ;
recup_photo($futuridphoto,$nomdefichier,$tailledefichier,$extfichier);
?>

<br>


<?
function recup_photo($futuridphoto,$nomdefichier,$tailledefichier,$extfichier)
{
$uploaddir = 'upimg/';


$uploadfile = $uploaddir.$futuridphoto.".".$extfichier;

echo $uploadfile;


}



?>