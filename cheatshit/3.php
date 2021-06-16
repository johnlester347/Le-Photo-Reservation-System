   <!-- <div class="form-group">
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
                     <input type="hidden" id="date" name="date" value="<?php //echo $_GET['Book'] ?>">

                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    

                </div>-->
                "<h2>Dear:".$name." <h2>
                            <h3>This is not a confirmation of your reservation.</h3>
                            <p>You are receiving this message in connection with your attemp to reserve </p>
                            <p>a schedule for Le Photo Station at 2nd Floor,Pilar Bldg.Romulo Blvd., San,Vicente,Tarlac,City on ".$date.", at ".$timeslot.". </p>
                            <p>To confirm your reservation please pay the 30% downpayment amounting to ₱".number_format($srp,2)." to your selected payment center</p>
                            <h4>using this information bellow</h4
                            <h4>Name:Roland M. Claveria</h4>
                            <h4>Address:San,Vicente,Tarlac,City</h4>
                            <h4>Contact:09xxxxxx</h4>
                            <p>After a successful payment checkout please send your proof of payment to our chatbox<a href='#'></a>for the confirmation of your reservation</p>
                            <p>For any concerns regarding your application and payment,</p>
                            <p>you may contact us in the chat box. Thank you!!</p>";
                            mailer::submit($body,$email);