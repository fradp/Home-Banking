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
	  	$dbName = "band";

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
				$username=$_SESSION["username"];
				$sql1 = "SELECT ID_Utente FROM utente WHERE Username = $username";
				$result = mysqli_query($conn, $sql1);
				if(mysqli_num_rows($result) > 0 )
				{
					
						$ID_Utente = $row["ID_Utente"];
						
				}
				else
				{
					echo "0 results";
				}

				$ID_ContoCorrente[]="";
				$sql2 = "SELECT ID_ContoCorrente FROM contocorrente INNER JOIN possiede ON ID_Utente=ID_ContoCorrente WHERE ID_Utente = $ID_Utente";
				$result = mysqli_query($conn, $sql2);
				if(mysqli_num_rows($result) > 0 )
				{
						$numeroConti = mysqli_num_rows($result);
						$ID_ContoCorrente[] = $row["ID_ContoCorrente"];
						
				}
				else
				{
					echo "0 results";
				}

				for($i=0;$i<$numrtoConti;$i++)
				{
					echo"$ID_ContoCorrente[$i]";
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
