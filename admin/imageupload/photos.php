<?php
session_start();
 $conn = new mysqli("localhost", "root", "", "finaltest5");


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
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color: black;">

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

            #uploadedFiles img {
                width: 100% !important;
            }
            #gridview {
            text-align:center; 
        }

      .heading{    
       padding: 10px 10px;
      border-radius: 2px;
      color: #FFF;
       background: #6aadf1;
       margin-bottom:10px;
       font-size: 1.5em;
     }
   


 </style>
  <!-- Navbar links -->
      
  <div id="gridview">
        <div class="heading">Image Gallery
        </div>

       <div class="container">
            <div class="row">
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