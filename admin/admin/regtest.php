   <?php

   include 'config.php';

                    $show="SELECT id,price FROM price";

                    $stmt=$con->prepare($show);
                   // $stmt->bind_param("i",$id);
                    $stmt->execute();
                    $result=$stmt->get_result();
                   $row=$result->fetch_assoc();


  ?>