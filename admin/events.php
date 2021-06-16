<?php
session_start();
include_once ('process.php');
include_once('registdb.php');
//include_once('payment.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <script type="text/javascript" language="javascript">
    window.history.forward();
  </script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width initial-scale=1,shrink-to-fit=no">
	<title>Le Photo</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#checkAll").click(function(){
      if($(this).is(":checked")){
          $(".checkItem").prop('checked',true);
      }
      else{
        $(".checkItem").prop('checked',false);
      }
    });
  });
</script>
</head>
<body>
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="pending.php">ADMIN</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>


  <!-- Navbar links -->
  
 <style type="text/css">
   .active{
    background-color: green;
   }
   li {
  border-right: 2px solid #bbb;
     }

 </style>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="records.php">Records History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registerd.php">Reservation Approval</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pending.php">Pending Request</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Edit
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a class="dropdown-item" href="package.php">Package</a>
           <a class="dropdown-item" href="imageupload/index.php">Gallery</a>
          <a class="dropdown-item" href="chatapp/chat.php">Chatbox</a>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="logout.php" onclick="return confirm('do you want to logout?')">Log out</a>
      </li>
    </ul>
  </div>
    <div class="form-inline">
          <label for="search" class="font-weight-bold lead text-dark">Search record</label>&nbsp;&nbsp;&nbsp;
          <input type="text" name="search" id="search_text" class="form-control form-control-lg rounded-0 border-primary" placeholder="search">
    </div>
</nav>

<form method="POST">
   <div class="col-md-12">

    <?php
      
      $id = $_GET['id'];
      $show="SELECT * FROM price where id = ?";
      $stmt=$con->prepare($show);
      $stmt->bind_param('i',$id);
      $stmt->execute();
      $result=$stmt->get_result();
      $row=$result->fetch_assoc();

    ?>
    <h3 class="text-center text-info"></h3>
      
      <div class="row">
          <div class="col-md-4">
          </div>

          <div class="col-md-4">
             <div class="form-group">
                <input type="hidden" name="id" value="<?=$row['id'];?>" class="recid">
              </div>
                <div class="form-group">
                    <label>Event</label>
                    <input type="text" required readonly name="event" id="event" value="<?=$row['event'];?>" class="form-control ">
                 </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" required value="<?=$row['price'];?>" id="price" name="price" class="form-control ">
                 </div>
                
                <div class="form-group pull-right">
                    <button class="btn btn-success" type="button" name="save" onclick="Onsubmit();">Update</button>  <div class="result"></div>   
               
                </div>
          </div>
          <div class="col-md-4">
          </div>
      </div>
    </div>
  </form>
      <script type="text/javascript">
  
  $(document).ready(function(){
    $("#search_text").keyup(function(){

      var search=$(this).val();
      $.ajax({
        url:'registerdAC.php',
        method:'POST',
        data:{query:search},
        success:function(response){
          $("#table-data").html(response);
        }
      });


    });
  });

  function Onsubmit(){
    var recordid =$(".recid").val();
    // alert(recordid);
    var event = $("#event").val();
    var price = $("#price").val();
     $.ajax({
        url:'pack.php',
        method:'POST',
        data:{id:recordid,event:event,price:price},
        success:function(response){
          // alert(response);
          $(".result").html(response);
        }
    });
  }
</script>
</body>
</html>