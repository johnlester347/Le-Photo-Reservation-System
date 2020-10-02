 <?php
 		$con=new mysqli("localhost","root","","finaltest");


		if ($con->connect_error) {

				die("could not connect to the data".$con->connect_error);
		}

 ?>