<?php
include 'config.php';

	$output='';


	if (isset($_POST['query'])) {
		$search=$_POST['query'];
		$stmt=$con->prepare("SELECT * FROM test1 WHERE name like CONCAT('%',?,'%')or id like CONCAT('%',?,'%')");
		$stmt->bind_param("ss",$search,$search);
	}
	else{
		$stmt=$con->prepare("SELECT * FROM test1");

	}
	$stmt->execute();
	$result=$stmt->get_result();

	if ($result->num_rows>0) {
			

			$output= " <thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
							   <th>Address</th>
								<th>School</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Date</th>
							</tr>
							</thead> 

							<tbody>";
							while ($row=$result->fetch_assoc()) {

								$output.=
								"<tr>
								<td>".$row['id']."</td>
								<td>".$row['name']."</td>
								<td>".$row['address']."</td>
								<td>".$row['school']."</td>
								<td>".$row['email']."</td>
								<td>".$row['contact']."</td>
								<td>".$row['date']."</td>
								</tr>";

							}
							$output.="</tbody>";
							echo $output;
						}
						else{
							echo "<h3> no result</h3>";

						}
							

	



?>