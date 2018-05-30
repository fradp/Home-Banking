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
			mysqli_query($conn, "START TRANSACTION");
			if(isset($_SESSION["username"]))
			{
				if(!isset($_POST["btnVersamento"]) && !isset($_SESSION["flag"])){
					echo"
					<form method=post action=#>
						<input type=text name=inputVersamento placeholder='Inserisci importo' required>
						<input type=text name=inputPin placeholder='Inserisci pin' required>
						<input type=submit name=btnVersamento value=Invia>
					</form>
				";
				}
				else{
					if(!isset($_POST["btnConferma"]) && !isset($_POST["btnIndietro"])){
						$importo = $_POST["inputVersamento"];
						$pin = $_POST["inputPin"];
						$id = $_SESSION["name"]; //id del contocorrente selezionato

						$sql = "SELECT Pin, Saldo FROM contocorrente WHERE ID_ContoCorrente = $id";
						$result = mysqli_query($conn, $sql);
						$rows = mysqli_fetch_assoc($result);
						if(mysqli_num_rows($result) > 0 )
						{
							if($pin==$rows["Pin"])
							{
								$nuovoSaldo = $importo + $rows["Saldo"];
								$sql2 = "UPDATE contocorrente SET Saldo = $nuovoSaldo WHERE ID_ContoCorrente = $id";
								if (mysqli_query($conn, $sql2)) {
								      //echo "<script>alert(\"Versamento effettuato\");</script>";
								      //mysqli_query($conn, "COMMIT");
								}
								else {
								  	mysqli_query($conn, "ROLLBACK");
								}
							}
							else
							{
								mysqli_query($conn, "ROLLBACK");
							}
						}
						else
						{
							mysqli_query($conn, "ROLLBACK");
						}

						echo"
							<form method=post action=#>
								Vuoi confermare l'operazione?
								<input type=submit name=btnConferma value=Conferma>
								<input type=submit name=btnIndietro value=Indietro>
							</form>
						";

						$_SESSION["flag"] = 1;
												
					}
					else
					{
						if(isset($_POST["btnConferma"])){
							mysqli_query($conn, "COMMIT");
						}
						else{
							mysqli_query($conn, "ROLLBACK");
							header("location:menu.php");
							echo "ciiaiao";																			
						}
						unset($_SESSION["flag"]);
					}
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