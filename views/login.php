<?php include_once "../includes/header.php";
$ctr->login();
?>

<body>
    <?php include_once "../includes/navbar.php" ?>
    <div class="row ">
        <div class="offset-md-4 col-md-4">
            
            <div class="bg-white border rounded-5 p-4">
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="register.php" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content ">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form method="post">
                        <span style="color:brown; font-weight:500"><?php echo $ctr->loginErr?></span>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                            <span style="color:brown; font-weight:500"><?php echo $ctr->userinputMsg?></span>
                                <input type="text" id="loginName" name="userinput" class="form-control"  value="<?php $ctr->oldInput("userinput");?>"/>
                                <label class="form-label" for="loginName">Email or username</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                            <span style="color:brown; font-weight:500"><?php echo $ctr->passwordErrMsg?></span>
                                <input type="password" id="loginPassword" name="password" class="form-control" />
                                <label class="form-label" for="loginPassword">Password</label>
                            </div>

                            <!-- 2 column grid layout -->
                            <div class="row mb-4">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check mb-3 mb-md-0">
                                        <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                        <label class="form-check-label" for="loginCheck"> Remember me </label>
                                    </div>
                                </div>

                                <div class="col-md-6 d-flex justify-content-center">
                                    <!-- Simple link -->
                                    <a href="#!">Forgot password?</a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Not a user? <a href="register.php">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Pills content -->
            </div>

        </div>
    </div>
</body>