 
 <!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> connexion au compte</title>
    </head>

    <body>

<form action="connexion_post.php" method="POST">
	<label for="pseudo">Pseudo </label>
	<input type="text" name="pseudo"/> </br>
	<label for="password">Mot de passe </label>
	<input type="password" name="mdp"/> </br>
	<input type="checkbox" name="autoConnect" id="autoconnect" />
    <label for="autoConnect"> connexion automatique </label> </br>
	 
		<input type="submit" value="Valider"/>
		
</form>

 
 