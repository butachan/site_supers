<?php 

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=superpouvoirs;charset=utf8', 'root', 'mdp');
}
	catch(Exception $e)
{
	die('Echec de la connexion pdo : '.$e-> getMessage());
}
$pseudoConnect = htmlspecialchars($_POST['pseudo']);

//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, passw FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudoConnect));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['mdp'], $resultat['passw']);

if (!$resultat)
{
    echo 'Mauvais identifiant !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudoConnect;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}