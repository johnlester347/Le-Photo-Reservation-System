<?php
	include 'config.php';
	
	
	if (isset($_GET['del'])) {
		$id=$con->real_escape_string($_GET['del']);
		$del="DELETE FROM registerd where id=?";
		$stmt=$con->prepare($del);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header("location:registerd.php");
	}
	 if (isset($_POST['submit'])) {
          if (isset($_POST['id'])) {
              foreach ($_POST['id'] as $id) {
               $stmt=$con->prepare("DELETE FROM registerd where id='$id'");
               $stmt->bind_param("i",$id);
               $stmt->execute();

               header("location:registerd.php");

              }
          }
      }

?>