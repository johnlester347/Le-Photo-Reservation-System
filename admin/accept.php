<?php
	/*include 'config.php';
		$accept=false;
	
		if (isset($_GET['accept'])) {
		$id=$con->real_escape_string($_GET['accept']);
		
		//inserting data using select statement
		$ins="INSERT INTO test1 select * from request where id=?";
		$stmt=$con->prepare($ins);
		$stmt->bind_param("i",$id);
		$stmt->execute();


		//hangang dito ah
		$insert="INSERT INTO registerd select *from request where id=?";
		$stmt=$con->prepare($insert);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		

		header("location:pending.php");

		$accept=true;

                if ($accept==true) {
                  $del="DELETE FROM request WHERE id=?";
                  $stmt=$con->prepare($del);
                  $stmt->bind_param("i",$id);
                  $stmt->execute();
                
         		 }
         		


}


?>*/