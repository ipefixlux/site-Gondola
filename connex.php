<?
$mysqli = new mysqli("localhost", "root", "mamp", "gondola");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>