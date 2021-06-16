  <head>  
        <title>Reset Password</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Reset Password</a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading"></div>
    <div class="panel-body">
    <form method="post" action="" name="update">

       <div class="form-group">
       <label>New Password</label>
       <input type="password" name="pass1" id="npass" class="form-control" />
      </div>
        <div class="form-group">
       <label>Confirm Password</label>
       <input type="password" name="pass2" id="cpass" class="form-control" />
      </div>
      
      <div class="form-group">
       <input type="button" name="reset" id="reset" class="btn btn-info" value="Reset" />

      </div>
   
      </div>
     </form>
    </div>
   </div>
  </div>
    </body> 

  <script type="text/javascript">
      $('#reset').click(function() {
          var url = window.location.href;

          var data = {
            ACTION : 'RESETPASS',
            url: url,
            npass: $('#npass').val(),
            cpass: $('#cpass').val()
          }

          if (data.npass == '' || data.cpass == '') {
              alert('Fill out All Fields!');
             return false;
          }

          if (data.npass != data.cpass) { 
             alert('Not Match!');
             return false;
          }

          $.post('resetpass.php', data, function(res) {
              if(res == 'success') {
                  alert('Successfully Changed!'); 
                  window.location.href = 'http://localhost/finaltest1/index.php';
                 return;
              }

              console.log(res);
          })
      })
  </script>

