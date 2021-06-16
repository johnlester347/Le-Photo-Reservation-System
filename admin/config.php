 <?php
 		$con=new mysqli("localhost","root","","finaltest5");


		if ($con->connect_error) {

				die("could not connect to the data".$con->connect_error);
		}

 ?>