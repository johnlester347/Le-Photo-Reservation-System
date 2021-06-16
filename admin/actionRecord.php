<?php
include 'config.php';

	$output='';


	if (isset($_POST['query'])) {
		$search=$_POST['query'];
		$stmt=$con->prepare("SELECT * FROM records WHERE name like CONCAT('%',?,'%')or id like CONCAT('%',?,'%')or date like CONCAT('%',?,'%')");
		$stmt->bind_param("sss",$search,$search,$search);
	}
	else{
		$stmt=$con->prepare("SELECT * FROM records");

	}
	$stmt->execute();
	$result=$stmt->get_result();

	if ($result->num_rows>0) {
			

			$output= " <thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Event</th>
								<th>Venue</th>
							    <th>Address</th>
								<th>School</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Date</th>
								<th>Timeslot</th>

							</tr>
							</thead> 

							<tbody>";
							while ($row=$result->fetch_assoc()) {

								$output.=
								"<tr>
								<td>".$row['id']."</td>
								<td>".$row['name']."</td>
								<td>".$row['event']."</td>
								<td>".$row['venue']."</td>
								<td>".$row['address']."</td>
								<td>".$row['school']."</td>
								<td>".$row['email']."</td>
								<td>".$row['contact']."</td>
								<td>".$row['date']."</td>
								<td>".$row['timeslot']."</td>
								</tr>";

							}
							$output.="</tbody>";
							echo $output;
						}
						else{
							echo "<h3> No result!!!</h3>";

						}
							

	



?>