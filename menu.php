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
				if(!isset($_POST['versamento']) && !isset($_POST['prelievo']) && !isset($_POST['bonifico'])){

					/* -------------------------------OPERAZIONE BRUTTA--------------------------------- */
					foreach($_POST as $name => $content) {

					}
					/* --------------------------------------------------------------------------------- */

					$_SESSION['name'] = $name;

					$sql = "SELECT possiede.ID_ContoCorrente, contocorrente.Saldo FROM possiede INNER JOIN contocorrente ON possiede.ID_ContoCorrente=contocorrente.ID_ContoCorrente WHERE possiede.ID_ContoCorrente=$name";
					$result = mysqli_query($conn, $sql);
					$rows = mysqli_fetch_assoc($result);
					if(mysqli_num_rows($result) > 0 )
					{
							$saldo = $rows["Saldo"];
							echo "Saldo: " . $saldo . "<br>";
					}
					else
					{
						echo "0 results";
					}
					$_SESSION["saldo"] = $saldo;


					echo "
					<form method=post action=#>
						<input type=submit value=Versamento name=versamento>
						<input type=submit value=Prelievo name=prelievo>
						<input type=submit value=Bonifico name=bonifico>
					</form>
					";
				}
				else{
					if(isset($_POST['versamento'])){
						header("location:versamento.php");
					}
					else{
						if(isset($_POST['prelievo'])){
							header("location:prelievo.php");
						}
						else{
							header("location:bonifico.php");
						}
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
