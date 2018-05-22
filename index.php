<!--
Progettare un DB per gestire i conti correnti di clienti di una banca si consenta di effetuare versamenti, prelievie e bonifici verso altri conti correnti della stessa banca.
ogni operazione deve esere gestita con transazioni con la possibilita di poter annulare l'operazione o per errore di sistema o per volnta dell'utente
-->

<html>
	<head>
	
		<title>Bank</title>

	</head>
	<body>

		<div style="text-align: center; font-size: 30px; ">
			Home Banking
		</div>

		<br>
		<br>
		<br>

		<div style="text-align: center;">
		<?php
		session_start();
		if(!isset($_SESSION["username"])){

			echo"<form action=login.php method=\"POST\">
				<div style=\"font-size: 30px;\">
					Login
				</div>
				<br>
				Username
				<br>
				<input type=\"text\" name=\"username\" placeholder=\"Username\">
				<br>
				<br>
				Password
				<br>
				<input type=\"password\" name=\"password\" placeholder=\"Password\">
				<br>
				<br>
				<input type=\"submit\" name=\"btnLogin\" value=\"Login\">
			</form>";
		}
		else{

			echo("login già effettuato");
		}

		?>
		</div>

	</body>
</html>

