<!DOCTYPE html>
<html>
    <head>
        <title>SeeU</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.js"></script>
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	   <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style_pop-up.css">
        <script src="js/script_pop-up.js" type="text/javascript"></script> 


      <!--  <link rel="stylesheet" type="text/css" href="css/style_accueil_nonconnecte.css"> -->

    </head>
    <body>
        <?php
			$conn = mysqli_connect('veggiecrush.masi-henallux.be:3306', 'api', 'api', 'alchimist');
			//if connection is not successful you will see text error
			if (!$conn) {
			       die('Could not connect: ' . mysqli_error());
			}
			//if connection is successfuly you will see message bellow
			//echo 'Connected successfully';
			 
            $sql = "SELECT * FROM ACCOUNT";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["id"]. " - pwd: " . $row["password"]. " email : " . $row["email"]. "<br>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
		?>
    </body>
</html>
