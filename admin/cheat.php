 <section class="pictorial-form">
        <div class="row">
            <div class="pictorial">
                <div class="pictorial__form">
                    <form action="admin/process.php" method="POST" class="form">
                        <div class="u-margin-bottom-small">
                            <h2 class="heading-secondary">
                                Graduation Pictorial
                            </h2>
                        </div>
                        <div class="form__group">
                            <input type="text" class="form__input" name="name" placeholder="Full name" id="name" required>
                            <label for="name" class="form__label">Full name</label>
                        </div>

                        <div class="form__group">
                            <input type="text" class="form__input" name="address" placeholder="Address" id="address" required>
                            <label for="address" class="form__label">Address</label>
                        </div>

                        <div class="form__group">
                            <input type="text" class="form__input" name="school" placeholder="Enter your school" id="school" required>
                            <label for="name" class="form__label">School</label>
                        </div>

                        <div class="form__group">
                            <input type="email" class="form__input" name="email" placeholder="Email" id="email" required>
                            <label for="email" class="form__label">Email</label>
                        </div>

                        <div class="form__group">
                            <input type="text" class="form__input" name="contact" placeholder="Contact Number" id="contact-number" required>
                            <label for="contact-number" class="form__label">Contact Number</label>
                        </div>

                        <div class="form__text-area">
                            <textarea class="form__text-input" name="message" placeholder="Your comments"></textarea>
                        </div>


                        <div class="form__group"> 
                            <button class="btn btn--green btn-margin u-margin-top2" name="register" onclick="return confirm('do you want to register')" >Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
 
    </section>