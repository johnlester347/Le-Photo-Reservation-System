<?php
    include('admin/process.php');
    if (isset($_GET['Book'])) {
        $date=$_GET['Book'];
    
    $stmt = $con->prepare("SELECT timeslot from records where date=?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }  
            $stmt->close();
        }
    }

}
  
$duration=20;
$cleanup=0;
$start="8:00";
$end="17:00";
 function timeslots($duration,$cleanup,$start,$end){

        $start=new DateTime($start);
        $end=new DateTime($end);
        $interval= new DateInterval("PT".$duration."M");
        $cleanupInterval=new DateInterval("PT".$cleanup."M");
        $slots=array();

        for ($intStart=$start; $intStart < $end ; $intStart->add($interval)->add($cleanupInterval)) { 
            $endPeriod=clone $intStart;
            $endPeriod->add($interval);
            if ($endPeriod>$end) {
                break;
            }
            $slots[]=$intStart->format("h:iA")."-".$endPeriod->format("h:iA");
        }
        return $slots;
    }  

     



?>
<!doctype html>
<html lang="en">
<?php
 include("admin/regtest.php");


?>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Reserve Slot:</h1><hr>
        <div class="row">
            <?php $timeslots =timeslots($duration,$cleanup,$start,$end); 
            foreach ($timeslots as $ts) {


            ?>
            <div class="col-md-2">
                <div class="form-group">
                    <?php if(in_array($ts, $bookings)){ ?>
                         <button class="btn btn-danger" onclick="time()"><?php echo $ts;?></button>

                        <?php }else{ ?>
                <button class="btn btn-success book" data-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button>
                 <?php } ?>
            </div>  
            </div>
        <?php }?>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <script type="text/javascript">
      function time(){
        alert('This timeslot is already taken.');
      }
    </script>
    <script>
        function lettersOnly(input){
            var regex=/[^a-z .]/gi;
            input.value=input.value.replace(regex,"");
        }
       
    </script>
   <script>

  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
        function submit(){
          alert('Successfuly saved please pay 30% payment');
        }
    </script>


    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Registration Form<!--<span id="slot"></span>--></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
               
                <div class="form-group" id="myButton">
                        <label>Choose Event:</label>
                         <button  class="btn btn-primary btnform " value="Graduation">Graduation</button>
                        <button   class="btn btn-primary btnform " value="Studio Package">Studio Package</button>
                        <button   class="btn btn-primary btnform " value="Wedding">Wedding</button>
                        <button   class="btn btn-primary btnform " value="SpecialEvent">Special Event</button>
                        <button   class="btn btn-primary btnform " value="Birthday">Birthday</button>
                    </div>

                
                    <!--For Graduation-->
                <form action="admin/process.php" method="POST" id="formElement" style="display: none;">
                <div class="form-group">
                  <?php
                      $sel="SELECT price,event from price where id=1";
                      $stmt=$con->prepare($sel);
                      $stmt->execute();
                      $result=$stmt->get_result();
                      $row=$result->fetch_assoc();


                  ?>
                    <label>Timeslot</label>
                    <input type="text" required readonly name="timeslot"  class="form-control timeslot">
                 </div>
<!--
                 <div class="form-group">
                
                 <input type="hidden" required readonly value="<?=$row['id'];?>" name="id" class="form-control">
               </div>
-->
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" required readonly name="price" value="<?=$row['price'];?>" class="form-control ">
                 </div>
                 <div class="form-group">
                    <input type="hidden" name="venue" class="form-control">
                 </div>
                  <div class="form-group">
                    <label>Event</label>
                    <input type="text" required readonly name="event" value="<?=$row['event']?>" class="form-control">
                 </div>
                    
              <div class="form-group">
                    <label>Name</label>
                    <input type="text" required name="name" id="name" onkeyup="lettersOnly(this)" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" required name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label>School</label>
                    <input type="text" required name="school" id="school" onkeyup="lettersOnly(this)" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" required name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" required name="contact" id="contact" onkeypress="return isNumberKey(event)" class="form-control">
                </div>
                <div class="form-group">
                    <label for="post_comment">Comment</label>
                    <textarea type="text" name="message" placeholder="Comment..." rows="3" cols="70" class="form-control"></textarea>
                </div>
                 <div class="form-group">
                     <input type="hidden" id="date" name="date" value="<?php echo $_GET['Book'] ?>">

                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" onclick="submit()" name="submit">Submit</button>   
                </div>
                 </form>
      <!--   <script type="text/javascript">
        function showForm() {
        document.getElementById('formElement').style.display = 'block';
            }
        </script>  -->

            <!--For Glamour-->
                     <form action="admin/process.php" method="POST" id="formGlamour" style="display: none;">
                <div class="form-group">
                   <?php
                      $sel="SELECT price,event from price where id=2";
                      $stmt=$con->prepare($sel);
                      $stmt->execute();
                      $result=$stmt->get_result();
                      $row=$result->fetch_assoc();


                  ?>
                    <label>Timeslot</label>
                    <input type="text" required readonly name="timeslot" id="" class="form-control timeslot">
                 </div>
                 
                 <div class="form-group">
                    <label>Price</label>
                    <input type="text" required readonly name="price" value="<?=$row['price'];?>" class="form-control ">
                 </div>
                 <div class="form-group">
                    <input type="hidden" name="venue" class="form-control">
                 </div>
                 <div class="form-group">
                    <input type="hidden" name="school" class="form-control">
                </div>
                  <div class="form-group">
                    <label>Event</label>
                    <input type="text" required readonly name="event" value="<?=$row['event'];?>" class="form-control">
                 </div>
                    
              <div class="form-group">
                    <label>Name</label>
                    <input type="text" required name="name" id="name" onkeyup="lettersOnly(this)" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" required name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" required name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" required name="contact" id="contact" onkeypress="return isNumberKey(event)" class="form-control">
                </div>
                <div class="form-group">
                    <label for="post_comment">Comment</label>
                    <textarea type="text" name="message" placeholder="Comment..." rows="3" cols="70" class="form-control"></textarea>
                </div>
                 <div class="form-group">
                     <input type="hidden" id="date" name="date" value="<?php echo $_GET['Book'] ?>">

                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>   
                </div>
                 </form>
       <!--  <script type="text/javascript">
        function showGlamour() {
        document.getElementById('formGlamour').style.display = 'block';
            }
        </script>  -->
                <!--For Wedding-->
                     <form action="admin/process.php" method="POST" id="formWed" style="display: none;">
                <div class="form-group">
                   <?php
                      $sel="SELECT price,event from price where id=5";
                      $stmt=$con->prepare($sel);
                      $stmt->execute();
                      $result=$stmt->get_result();
                      $row=$result->fetch_assoc();


                  ?>
                    <label>Timeslot</label>
                    <input type="text" required readonly name="timeslot" id="" class="form-control timeslot">
                 </div>
                 <div class="form-group">
                    <label>Price</label>
                    <input type="text" required readonly name="price" value="<?=$row['price']?>" class="form-control ">
                 </div>
                  <div class="form-group">
                    <label>Event</label>
                    <input type="text" required readonly name="event" value="<?=$row['event']?>" class="form-control">
                 </div>
                 <div class="form-group">
                    <input type="hidden" name="school" class="form-control">
                </div>
                    
              <div class="form-group">
                    <label>Name</label>
                    <input type="text" required name="name" id="name" onkeyup="lettersOnly(this)" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" required name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label>Venue</label>
                    <input type="text" required name="venue" id="venue"  class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" required name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" required name="contact" id="contact" onkeypress="return isNumberKey(event)" class="form-control">
                </div>
                <div class="form-group">
                    <label for="post_comment">Comment</label>
                    <textarea type="text" name="message" placeholder="Comment..." rows="3" cols="70" class="form-control"></textarea>
                </div>
                 <div class="form-group">
                     <input type="hidden" id="date" name="date" value="<?php echo $_GET['Book'] ?>">

                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>   
                </div>
                 </form>
       <!--  <script type="text/javascript">
        function showWed() {
        document.getElementById('formWed').style.display = 'block';
            }
        </script>  -->
                <!--For Birthday-->
                <form action="admin/process.php" method="POST" id="formBirth" style="display: none;">
                <div class="form-group">

                  <?php
                      $sel="SELECT price,event from price where id=9";
                      $stmt=$con->prepare($sel);
                      $stmt->execute();
                      $result=$stmt->get_result();
                      $row=$result->fetch_assoc();


                  ?>
                    <label>Timeslot</label>
                    <input type="text" required readonly name="timeslot" id="" class="form-control timeslot">
                 </div>
                 <div class="form-group">
                    <input type="hidden" name="school" class="form-control">
                </div>
                 <div class="form-group">
                    <label>Price</label>
                    <input type="text" required readonly name="price" value="<?=$row['price'];?>" class="form-control ">
                 </div>
                  <div class="form-group">
                    <label>Event</label>
                    <input type="text" required readonly name="event" value="<?=$row['event'];?>" class="form-control">
                 </div>
                    
              <div class="form-group">
                    <label>Name</label>
                    <input type="text" required name="name" id="name" onkeyup="lettersOnly(this)" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" required name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label>Venue</label>
                    <input type="text" required name="venue" id="venue" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" required name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" required name="contact" id="contact" onkeypress="return isNumberKey(event)" class="form-control">
                </div>
                <div class="form-group">
                    <label for="post_comment">Comment</label>
                    <textarea type="text" name="message" placeholder="Comment..." rows="3" cols="70" class="form-control"></textarea>
                </div>
                 <div class="form-group">
                     <input type="hidden" id="date" name="date" value="<?php echo $_GET['Book'] ?>">

                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>   
                </div>
                 </form>
       <!--  <script type="text/javascript">
        function showBirth() {
        document.getElementById('formBirth').style.display = 'block';
            }
        </script>  -->

        <!--For Special events-->
                <form action="admin/process.php" method="POST" id="formSpec" style="display: none;">
                <div class="form-group">
                   <?php
                      $sel="SELECT price,event from price where id=8";
                      $stmt=$con->prepare($sel);
                      $stmt->execute();
                      $result=$stmt->get_result();
                      $row=$result->fetch_assoc();


                  ?>
                    <label>Timeslot</label>
                    <input type="text" required readonly name="timeslot" id="" class="form-control timeslot">
                 </div>
                 <div class="form-group">
                    <input type="hidden" name="school" class="form-control">
                </div>
                 <div class="form-group">
                    <label>Price</label>
                    <input type="text" required readonly name="price" value="<?=$row['price'];?>" class="form-control ">
                 </div>
                  <div class="form-group">
                    <label>Event</label>
                    <input type="text" required readonly name="event" value="<?=$row['event'];?>" class="form-control">
                 </div>
                    
              <div class="form-group">
                    <label>Name</label>
                    <input type="text" required name="name" id="name" onkeyup="lettersOnly(this)" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" required name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label>Venue</label>
                    <input type="text" required name="venue" id="venue" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" required name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" required name="contact" id="contact" onkeypress="return isNumberKey(event)" class="form-control">
                </div>
                <div class="form-group">
                    <label for="post_comment">Comment</label>
                    <textarea type="text" name="message" placeholder="Comment..." rows="3" cols="70" class="form-control"></textarea>
                </div>
                 <div class="form-group">
                     <input type="hidden" id="date" name="date" value="<?php echo $_GET['Book'] ?>">

                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>   
                </div>
                 </form>
       <!--  <script type="text/javascript">
        function showSpec() {
        document.getElementById('formSpec').style.display = 'block';
            }
        </script>  -->


            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
            $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#").html(timeslot);
            $(".timeslot").val(timeslot);
            $("#myModal").modal("show");
            })
            

            $('.btnform').on('click', function(e) {
                e.preventDefault();

                var val = $(this).val();

                switch(val) {
                    case 'Graduation':
                      $('#formElement').show();
                      $('#formGlamour,#formWed,#formBirth,#formSpec').hide();
                    break;
                    case 'Studio Package':
                      $('#formGlamour').show();
                      $('#formElement,#formWed,#formBirth,#formSpec').hide();
                    break;
                    case 'Wedding':
                      $('#formWed').show();
                      $('#formGlamour,#formElement,#formBirth,#formSpec').hide();
                    break;
                    case 'SpecialEvent':
                      $('#formSpec').show();
                      $('#formGlamour,#formWed,#formElement,#formBirth').hide();
                    break;
                    case'Birthday':
                      $('#formBirth').show();
                      $('#formGlamour,#formWed,#formSpec,#formElement').hide();
                    break;
                }
                    // Get the container element
                var btnContainer = document.getElementById("myButton");

               // Get all buttons with class="btn" inside the container
                var btns = btnContainer.getElementsByClassName("btn");

               // Loop through the buttons and add the active class to the current/clicked button
               for (var i = 0; i < btns.length; i++) {
               btns[i].addEventListener("click", function() {
              var current = document.getElementsByClassName("active");

             // If there's no active class
              if (current.length > 0) {
              current[0].className = current[0].className.replace(" active", "");
             }

            // Add the active class to the current/clicked button
          this.className += " active";
              });
            }

               
              
            })

    </script>

  </body>

</html>
