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
		$dbHost = "127.0.0.1";
	  	$dbUsername = "admin";
	  	$dbPassword = "admin";
	  	$dbName = "banca";

	  	$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
	  	
		if (!$conn) 
		{
	    	die("Connection failed: " . mysqli_connect_error());
		}
		else
		{

			session_start();
			if(isset($_SESSION["username"]))
			{
				mysqli_query($conn, "START TRANSACTION");
				if(!isset($_POST["btnVersamento"])){
					echo"
					<form method=post action=#>
						<input type=text name=inputVersamento placeholder='Inserisci importo' required>
						<input type=submit name=btnVersamento value=Invia>
					</form>
				";
				}
				else {
					//selezionare id e saldo del contocorrente
					//recupera id da $_SESSION['name'] 

					/*$sql2 = "UPDATE contocorrente SET Saldo = $nuovoSaldo WHERE ID_ContoCorrente = $ID";
					if (mysqli_query($conn, $sql)) {
					      echo "<script>alert(\"Versamento effettuato\");</script>";
					      mysqli_query($conn, "COMMIT");
					}
					else {
					  	$error="Error: " . $sql . "<br>" . mysqli_error($conn);
					    echo "<script>alert(\"".$error."\");</script>";
					    //header("location: insConcerto.php");
					}*/
				}

			}
			else
			{

				header("location:index.php");
			}
		}
		?>
		</div>

	</body>
</html>