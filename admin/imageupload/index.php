<?php
session_start();
 $conn = new mysqli("localhost", "root", "", "finaltest5");

    if (isset($_POST['delImage'])) {
        $id = $conn->real_escape_string($_POST['id']);
        $conn->query("DELETE FROM photos WHERE id='$id'");
        exit('success');
    }

    if (isset($_POST['getImages'])) {
        $start = $conn->real_escape_string($_POST['start']);
        $sql = $conn->query("SELECT id, path FROM photos ORDER BY id DESC LIMIT $start, 8");
        $response = array();
        while ($data = $sql->fetch_assoc())
            $response[] = array("path" => $data['path'], "id" => $data['id']);

        exit(json_encode(array("images" => $response)));
    }

    if (isset($_FILES['attachments'])) {
        $msg = "";
        $targetFile = time() . basename($_FILES['attachments']['name'][0]);

        if (file_exists($targetFile))
            $msg = array("status" => 0, "msg" => "File already exists!");
        else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], "images/" . $targetFile)) {
            $msg = array("status" => 1, "msg" => "File Has Been Uploaded", "path" => "images/" . $targetFile);

            $conn->query("INSERT INTO photos (path, uploadedOn) VALUES ('$targetFile', NOW())");
        }

        exit(json_encode($msg));
    }

    $sql = $conn->query("SELECT id FROM photos");
    $numRows = $sql->num_rows;
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
</head>
<body>
  <form action="process.php" method="POST">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="pending.php">ADMIN</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

   <style type="text/css">
   .active{
    background-color: green;
   }
   li {
  border-right: 2px solid #bbb;
 
     }
      #dropZone {
                border: 3px dashed #0088cc;
                padding: 50px;
                width: 500px;
                margin-top: 20px;
            }

            #files {
                border: 1px dotted #0088cc;
                padding: 20px;
                width: 200px;
                display: none;
            }

            #error {
                color: red;
            }

            .container, .row {
                margin-top: 50px;
            }

            #uploadedFiles img {
                width: 100% !important;
            }

 </style>
  <!-- Navbar links -->
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../records.php">Records History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../registerd.php">Reservation Approval</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pending.php">Accepted Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../admin/admin_calendar.php">Calendar</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Edit
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../package.php">Package</a>
          <a class="dropdown-item" href="index.php">Gallery</a>
          <a class="dropdown-item" href="../chatapp/chat.php">Chatbox</a>
        </div>
      </li>      
      
       <li class="nav-item">
        <a class="nav-link" href="../logout.php" onclick="return confirm('do you want to logout?')">Log out</a>
      </li>
    </ul>
  </div>
</nav>

       <div class="container">
            <div class="row">
                <div class="col-md-12" align="center">
               
                <div id="dropZone">
                    <h1>Drag & Drop Files...</h1>
                    <input type="file" id="fileupload" name="attachments[]" multiple>
                </div>
                <h1 id="error"></h1><br><br>
                <h1 id="progress"></h1><br><br>
                <div id="files"></div>
                </div>
            </div>
        </div>
        <div class="container" id="uploadedFiles">
            <div class="row">
                <!-- <div class="col-md-3 myImg"></div> -->
            </div>
        </div>

        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
        <script src="js/jquery.iframe-transport.js" type="text/javascript"></script>
        <script src="js/jquery.fileupload.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                getImages(0, <?php echo $numRows ?>);
            });

            function getImages(start, max) {
                if (start > max)
                    return;

                $.ajax({
                    url: 'index.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        getImages: 1,
                        start: start
                    }, success: function (response) {
                        for (var i=0; i < response.images.length; i++)
                            addImage("images/" + response.images[i].path, response.images[i].id);

                        getImages((start+8), max);
                    }
                });
            }

            function delImg(id) {
                if (id === 0)
                    alert('You are not able to delete this image now!');
                else if (confirm('Are you sure that you want to delete this image?')) {
                    $.ajax({
                        url: 'index.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            delImage: 1,
                            id: id
                        }, success: function (response) {
                            $("#img_"+id).remove();
                        }
                    });
                }
            }

            $(function () {
               var files = $("#files");

               $("#fileupload").fileupload({
                   url: 'index.php',
                   dropZone: '#dropZone',
                   dataType: 'json',
                   autoUpload: false
               }).on('fileuploadadd', function (e, data) {
                   var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                   var fileName = data.originalFiles[0]['name'];
                   var fileSize = data.originalFiles[0]['size'];

                   if (!fileTypeAllowed.test(fileName))
                        $("#error").html('Only images are allowed!');
                   else if (fileSize > 500000000)
                       $("#error").html('Your file is too big! Max allowed size is: 50MB');
                   else {
                       $("#error").html("");
                       data.submit();
                   }
               }).on('fileuploaddone', function(e, data) {
                    var status = data.jqXHR.responseJSON.status;
                    var msg = data.jqXHR.responseJSON.msg;

                    if (status == 1) {
                        var path = data.jqXHR.responseJSON.path;
                        addImage(path, 0);
                    } else
                        $("#error").html(msg);
               }).on('fileuploadprogressall', function(e,data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $("#progress").html("Completed: " + progress + "%");
               });
            });

            function addImage(path, id) {
                if ($("#uploadedFiles").find('.row:last').find('.myImg').length === 4)
                    $("#uploadedFiles").append('<div class="row"></div>');


                $("#uploadedFiles").find('.row:last').append('<div id="img_'+id+'" class="col-md-3 myImg" onclick="delImg('+id+')"><img src="'+path+'" /></div>');
            }
        </script>


</body>
</html>