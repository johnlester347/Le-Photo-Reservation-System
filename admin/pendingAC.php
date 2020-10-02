<?php
include 'config.php';

	$output='';


	if (isset($_POST['query'])) {
		$search=$_POST['query'];
		$stmt=$con->prepare("SELECT * FROM request WHERE name like CONCAT('%',?,'%')or id like CONCAT('%',?,'%')");
		$stmt->bind_param("ss",$search,$search);
	}
	else{
		$stmt=$con->prepare("SELECT * FROM request");

	}
	$stmt->execute();
	$result=$stmt->get_result();

	if ($result->num_rows>0) {
			

			?>
			 <thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
							   <th>Address</th>
								<th>School</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Date</th>
								<th>Action</th>

							</tr>
							</thead> 

							<tbody>
			<?php
							while ($row=$result->fetch_assoc()) {

								?>  
								<tr>
								<td><?= $row['id']?></td>
								<td><?=$row['name']?></td>
								<td><?=$row['address']?></td>
								<td><?=$row['school']?></td>
								<td><?=$row['email']?></td>
								<td><?=$row['contact']?></td>
								<td><?=$row['date']?></td>
								<td></td>
								<td>
									<a href='delete.php?delete=<?= $row['id']?>&&ACTION=DELETES' 
									class='badge badge-danger p-3' 
									onclick="return confirm('do you want to delete this record')">Delete</a>

									<a href='delete.php?accept=<?= $row['id']?>&&ACTION=ACCEPT'
									class='badge badge-success p-3' 
									onclick="return confirm('do you want to accept?')">Accept</a>

								</td>
								</tr>

								 <?php
								

							} 
							?> </tbody> <?php
							//echo $output;
						}
						else{
							echo "<h3> No result!!!</h3>";

						}
							

	



?>