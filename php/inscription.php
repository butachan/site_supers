<?php
session_start(); // On démarre la session AVANT toute chose
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
	setcookie('pseudo', $_SESSION['pseudo'], time()+3600*24);
}
if (isset($_SESSION['id']) AND isset($_SESSION['mdp']))
{
    echo 'Bonjour ' . $_SESSION['mdp'];
	setcookie('password', $_SESSION['mdp'], time()+3600*24);
}

?>
<!DOCTYPE html>
<html>
  
<head>
    <title>
      Inscription
  </title>
    <meta charset="UTF-8"/>
</head>

  
<body style="text-align:center">
    <H1>Welcome hero!</H1>
	<form action="inscription_post.php" method="POST">
	<section>
		<label for="pseudo">Pseudo :</label>
		<input type="text" name="pseudo"/> </br>
		<label for="password">Mot de passe:</label>
		<input type="password" name="mdp"/> </br>
		<label for="passwordconfirm"> Confirmer le mot de passe :</label>
		<input type="password" name="mdpconfirm"/> </br>
		<label for="email">Adresse Email :</label>
		<input type="email" name="mail"/> </br>
		<input type="submit" value="Valider"/>
	</section>
	</form>
</body>
  
</html>