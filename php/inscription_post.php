<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>accueil blog</title>
		<link rel = "stylesheet" href="css/blogstyle.css" />
		
    </head>
	
	<body>
<?php 
// Vérification de la validité des informations
$pseudoValide= TRUE;
$mailValide = TRUE;
$passIdem = TRUE;

 try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=superpouvoirs;charset=utf8', 'root', 'mdp');
		}
		catch(Exception $e)
		{
		die('Echec de la connexion pdo : '.$e-> getMessage());
		}
//pseudo
$pseudoEntre = htmlspecialchars($_POST['pseudo']);
$cherchePseudo = $bdd ->prepare('SELECT * FROM membres WHERE pseudo = ?');
$cherchePseudo -> execute([$pseudoEntre]);
$doublonPseudo = $cherchePseudo ->fetch();
if ($doublonPseudo){
	echo 'pseudo déjà pris';
	$pseudoValide = FALSE;
}
else { 
	echo 'pseudo accordé';
	}

//mail
$mailEntre = htmlspecialchars($_POST['mail']);
if (preg_match( "#[a-zA-Z]{5,}@([a-zA-Z])+\.([a-zA-Z])+$#  " , $mailEntre))
	{
			echo 'adresse email correct </br>';
	}
else
	{
		echo 'veuillez saisir une adresse email valide';
		$mailvalide = FALSE;
	}

//mot de passe
 htmlspecialchars($_POST['mdp']);
 htmlspecialchars($_POST['mdpconfirm']);
if (htmlspecialchars($_POST['mdp'])!=htmlspecialchars($_POST['mdpconfirm']))
{
	echo 'confirmation de mot de passe non validé';
	$passIdem = FALSE;
}
else
{
	echo 'mot de passe correct';
}
if($pseudoValide AND $mailValide AND $passIdem)
{
	echo 'envoi du formulaire en cours, vous êtes enregistré </br>';
	
	$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

	// Insertion
	$today = date("Y-m-d");
	$req = $bdd->prepare('INSERT INTO membres(pseudo, passw,id_groupe, email, date_inscription) VALUES(:pseudo, :pass,:groupe, :email, :date)');
	$req->execute(array(
		'pseudo' => $pseudoEntre,
		'pass' => $pass_hache,
		'groupe' => 2,
		'email' => $mailEntre,
		'date' => $today));
	$req ->closeCursor();	
}

?>

	</body>
</html>

