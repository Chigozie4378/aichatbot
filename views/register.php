<?php include_once "../includes/header.php";

$ctr->register();
?>
<a href=""></a>
<body>
    <?php include_once "../includes/navbar.php" ?>
    <div class="row">
        <div class="offset-md-4 col-md-4 col-sm-12">
            <div class="bg-white border rounded-5 p-4">
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link " data-mdb-toggle="pill" href="login.php" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-mdb-toggle="pill" href="register.php" role="tab" aria-controls="pills-login" aria-selected="true">Register</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form method="post">
                        <span style="color:brown; font-weight:500"><?php echo $ctr->registerErr?></span>
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                            <label class="form-label" for="registerName">First Name</label>
                                <input type="text" id="registerName" name="firstname" class="form-control" value="<?php $ctr->oldInput("firstname");?>"/>
                               <span style="color:brown; font-weight:500"><?php echo $ctr->firstnameErrMsg?></span>
                            </div>
                            <div class="form-outline mb-4">
                            <label class="form-label" for="registerName">Last Name</label>
                                <input type="text" id="registerName" name="lastname" class="form-control" value="<?php $ctr->oldInput("lastname");?>"//>
                                <span style="color:brown; font-weight:500"><?php echo $ctr->lastnameErrMsg?></span>
                            </div>


                            <!-- Username input -->
                            <div class="form-outline mb-4">
                            <label class="form-label" for="registerUsername">Username</label>
                                <input type="text" id="registerUsername" name="username" class="form-control" value="<?php $ctr->oldInput("username");?>"//>
                                <span style="color:brown; font-weight:500"><?php echo $ctr->usernameErrMsg?></span>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                            <label class="form-label" for="registerEmail">Email</label>
                                <input type="email" id="registerEmail" name="email" class="form-control" value="<?php $ctr->oldInput("email");?>"//>
                                <span style="color:brown; font-weight:500"><?php echo $ctr->emailErrMsg?></span>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                            <label class="form-label" for="registerPassword">Password</label>
                                <input type="password" id="registerPassword" name="password" class="form-control" />
                                <span style="color:brown; font-weight:500"><?php echo $ctr->passwordErrMsg?></span>
                            </div>

                            <!-- Repeat Password input -->
                            <div class="form-outline mb-4">
                            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                                <input type="password" id="registerRepeatPassword" name="cpassword" class="form-control" />
                            </div>

                            <!-- Checkbox -->
                            <!-- <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" />
                                <label class="form-check-label" for="registerCheck">
                                    I have read and agree to the terms
                                </label>
                            </div> -->

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-3" name="register">Sign in</button>
                        </form>
                    </div>
                </div>
                <!-- Pills content -->
            </div>
        </div>
    </div>

</body>