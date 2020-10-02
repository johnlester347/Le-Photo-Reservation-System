<?php
    include('admin/process.php');
    if (isset($_GET['Book'])) {
        $date=$_GET['Book'];
    
    $stmt = $con->prepare("SELECT * from request where date=?");
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

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Book</h1><hr>
        <div class="row">
            <?php $timeslots =timeslots($duration,$cleanup,$start,$end); 
            foreach ($timeslots as $ts) {


            ?>
            <div class="col-md-2">
                <div class="form-group">
                    <?php if(in_array($ts, $bookings)){ ?>
                         <button class="btn btn-danger"><?php echo $ts;?></button>

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

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Book<span id="slot"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form action="admin/process.php" method="POST">
                <div class="form-group">
                    <label>Timeslot</label>
                    <input type="text" required readonly name="timeslot" id="timeslot" class="form-control">
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" required name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" required name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label>School</label>
                    <input type="text" required name="school" id="school" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" required name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" required name="contact" id="contact" class="form-control">
                </div>
                 <div class="form-group">
                     <input type="hidden" id="date" name="date" value="<?php echo $_GET['Book'] ?>">

                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    

                </div>


                 </form>
                
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
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
            })

    </script>
  </body>

</html>
