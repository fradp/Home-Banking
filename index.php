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
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
				<div style="font-size: 30px;">
					Login
				</div>
				<br>
				Numero Conto
				<br>
				<input type="text" name="num" placeholder="Numero conto">
				<br>
				<br>
				PIN
				<br>
				<input type="password" name="pin" placeholder="PIN">
				<br>
				<br>
				<input type="submit" name="btnLogin" value="Login">
			</form>
		</div>

	</body>
</html>


<?php


//controllo login 


?>