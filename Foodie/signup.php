<?php
    include("DB.php");

    if(isset($_GET['submit'])){
        
        //echo 'testttttt';
        $name_add=$_GET['user'];
        $pass_add=$_GET['pass'];
        $fname=$_GET['fname'];
        $sname=$_GET['sname'];
        $mail=$_GET['mail_add'];
        $phone=$_GET['phone_add'];
        $city=$_GET['city_add'];
        $id_add='';
        //echo "<h1>$name </h1><br> <h1>$description </h1><br> <h1>$price </h1><br> <h1>$img </h1><br> <h1>$type </h1><br> <h1>____$id </h1>";

        $q="INSERT INTO `user` VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
        $done = $db->queryOp($q,array($id_add, $name_add, $pass_add, $fname, $sname, $mail, $phone, $city)); 
        
    }
?>
<!DOCTYPE html>

<html>

<head>
    <title> foodie </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/rtl.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.css"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar_signup navbar navbar-expand-lg navbar-light bg-light bglt">
        <img class="navbar-brand" src="images/logo.png">
        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">-->
        <!--  <span class="navbar-toggler-icon"></span>-->
        <!--</button>-->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#book">RESERVATION <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#menu">MENU <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">PAGES <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">NEWS <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">CONTACT <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <!-- <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a> -->

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                        Sign in
                    </a>
                    <div class="dropdown_login dropdown-menu dropdown-menu-right">
                        <form class="px-4 py-3">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheckBox">
                                <label class="form-check-label" for="dropdownCheckBox">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="reserveBtn btn">Sign in</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="signup.php">New member? Create Account</a>

                    </div>
                </li>
                <!--<li class="nav-item ">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>-->
            </ul>
        </div>
    </nav>
    <div class="signupContent row ">
        <div class=" welcomeSignup welcome">
            <div style="padding:30px;">
                <div class="form_div panel-body col-lg-8">
                    <span class="crtAcnt_up">
                        Creating Acount
                    </span>
                    <br>
                    <span class="crtAcnt_dwn">
                        For Fast Ordering and Special Offers
                    </span>
                    <div class="form_content">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputEmail4">First Name *</label>
                                    <input type="text" class="signUpform_ctrl form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputPassword4">Second Name *</label>
                                    <input type="text" class="signUpform_ctrl form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputPassword4">Email *</label>
                                    <input type="email" class="signUpform_ctrl form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputEmail4">Mobile Number *</label>
                                    <input type="text" class="signUpform_ctrl form-control" id="inputEmail4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputPassword4">Password *</label>
                                    <input type="password" class="signUpform_ctrl form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputEmail4">Re-Password *</label>
                                    <input type="password" class="signUpform_ctrl form-control" id="inputEmail4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputEmail4">City *</label>
                                    <select id="inputState" class="signUpform_ctrl form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputPassword4">Area *</label>
                                    <select id="inputState" class="signUpform_ctrl form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <button class="reserveBtn btn" type="submit">CREATE ACCOUNT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>