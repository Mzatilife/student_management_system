<div class="row">
                            <div class="col-12 mb-4">
                                <div class="card border-light shadow-sm components-section">
                                    <div class="card-body">
                                    <?php
                                    if (empty($msg)) {}
                                    else{
                                    echo "<div class='alert alert-danger text-center'>
                                    <strong>".$msg."</strong>
                                    </div>";
                                    }
                                    ?>

                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="mt-4" enctype="multipart/form-data">     
                                        <div class="row mb-4">
                                            <div class="col-lg-4 col-sm-6">
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">First name</label>
                                                    <input type="text" name="fname" class="form-control" id="firstName" required>
                                                </div>
                                                <!-- End of Form -->
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Last name</label>
                                                    <input type="text" name="lname" class="form-control" id="firstName"  required>
                                                </div>
                                                <!-- End of Form -->
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Semester</label>
                                                    <input type="number" name="sem" class="form-control" min="1" value="1" id="firstName"  required>
                                                </div>
                                                <!-- End of Form -->
                                                 <!-- Form -->
                                                <div class="mb-4">
                                                <label class="my-1 mr-2" for="country">On campus/ off campus</label>
                                                    <select class="form-control" id="country" name="campus" aria-label="Default select example">
                                                        <option selected>Open this select menu</option>
                                                        <option value="oncampus">On Campus</option>
                                                        <option value="offcampus">Off campus</option>
                                                    </select>
                                                </div>
                                                <!-- End of Form -->
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">National ID</label>
                                                    <input type="text" name="nationalID" class="form-control" id="firstName"  required>
                                                </div>
                                                <!-- End of Form -->
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Nationality</label>
                                                    <input type="text" name="national" class="form-control" id="firstName" required>
                                                </div>
                                                <!-- End of Form --> 

                                                 <!-- Form -->
                                                <div class="mb-4">
                                                <label class="my-1 mr-2" for="country">Gender</label>
                                                    <select class="form-control" id="country" name="gender" aria-label="Default select example">
                                                        <option selected>Open this select menu</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                                <!-- End of Form -->
                                                 <div class="mb-3">
                                                    <label for="birthday">Date of Birthday</label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="birthday" type="date" placeholder="dd/mm/yyyy" name="DOB" required>
                                                    </div>
                                                </div>
                                                <!-- Form -->    
                                                  <!-- Form -->
                                                <div class="my-4">
                                                    <label for="textarea">Mailing Address</label>
                                                    <textarea class="form-control" placeholder="Enter Mailing address..." id="textarea" rows="4" name="mailingad"></textarea>
                                                  </div>
                                                <!-- End of Form -->
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Village</label>
                                                    <input type="text" name="village" class="form-control" id="firstName" required>
                                                </div>
                                                <!-- End of Form --> 
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Traditional Authority</label>
                                                    <input type="text" name="TA" class="form-control" id="firstName" required>
                                                </div>
                                                <!-- End of Form --> 
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">District</label>
                                                    <input type="text" name="district" class="form-control" id="firstName" required>
                                                </div>
                                                 <!-- Form -->
                                                <div class="mb-4">
                                                <label class="my-1 mr-2" for="country">Marital Status</label>
                                                    <select class="form-control" id="country" name="marital" aria-label="Default select example">
                                                        <option selected>Open this select menu</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                    </select>
                                                </div>
                                                <!-- End of Form -->
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Spouse name</label>
                                                    <input type="text" name="sname" class="form-control" id="firstName">
                                                </div>
                                                <!-- End of Form -->
                                                 <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Spouse Address</label>
                                                    <input type="text" name="saddress" class="form-control" id="firstName">
                                                </div>
                                                <!-- End of Form -->
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Spouse Phone Number</label>
                                                    <input type="text" name="sphone" class="form-control" id="firstName">
                                                </div>
                                                <!-- End of Form -->
                                                 <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Spouse Email</label>
                                                    <input type="email" name="semail" class="form-control" id="firstName">
                                                </div>
                                                <!-- End of Form -->

                                                 <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">District</label>
                                                    <input type="text" name="sdictrict" class="form-control" id="firstName">
                                                </div>
                                                <!-- End of Form -->
                                                <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Traditional Authority</label>
                                                    <input type="text" name="sta" class="form-control" id="firstName">
                                                </div>
                                                <!-- End of Form -->
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                            
                                                 <!-- Form -->
                                                 <div class="mb-3">
                                                    <label for="firstName">Guardian name</label>
                                                    <input type="text" name="gname" class="form-control" id="firstName" required>
                                                </div>
                                                 <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Guardian Occupation</label>
                                                    <input type="text" name="goccupation" class="form-control" id="firstName" required>
                                                </div>
                                                <!-- End of Form -->
                                                 <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Guardian Email</label>
                                                    <input type="email" name="gemail" class="form-control" id="firstName" required>
                                                </div>
                                                <!-- End of Form -->
                                                 <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Guardian Mobile</label>
                                                    <input type="text" name="gmobile" class="form-control" id="firstName" required>
                                                </div>
                                                <!-- End of Form -->
                                                <!-- Form -->
                                                <div class="my-4">
                                                    <label for="textarea">Guardian Mailing Address</label>
                                                    <textarea class="form-control" placeholder="Enter Mailing address..." id="textarea" rows="4" name="gmailing"></textarea>
                                                  </div>
                                                <!-- End of Form -->
                                                 <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Highest Qualification</label>
                                                    <input type="text" name="hq" class="form-control" id="firstName" required>
                                                </div>
                                                <!-- End of Form -->
                                                 <!-- Form -->
                                                <div class="mb-3">
                                                    <label for="firstName">Year Obtained</label>
                                                    <input type="year" name="year" maxlength="4" class="form-control" id="firstName" required>
                                                </div>
                                                
                                                <!-- Form -->
                                                <div class="mb-3 align-content-center">
                                                <input class="btn btn-block btn-info" name="submit" type="submit" value="Submit">
                                                </div>
                                                <!-- End of Form -->
                                            </div>
                                            
                                            
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
