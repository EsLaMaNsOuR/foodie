<?php
    include("DB.php");




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
    </nav>
    <div class="signupContent row ">
        <div class=" welcomeSignup welcome">
            <div style="padding:30px;">
            <?php
            if ( isset($_POST['submitlogin'])){
        if ( !empty($_POST['user']) && !empty($_POST['pass'])){
            $user=$_POST['user'];
            $pass=$_POST['pass'];

            //echo $user.'___'.$pass.'<br>';
            $q1="SELECT * FROM `user` Where `username`=? AND `password`=?";
            $rows=$db->getRows($q1,array($user, $pass));
            if(count($rows)>0){
                foreach($rows as $row){
                    $dbuser=$row[1];
                    $dbpass=$row[2];
                }
                echo $dbuser.'___'.$dbpass.'<br>';
                if ( $user==$dbuser && $pass==$dbpass ){
                    session_start();
                    $_SESSION['sess_user_buyer']=$user;
                    header("Location:index.php");
                }
                else{
                    echo'<div class="logalert alert alert-danger">
                    <strong> Username or password was incorrect</strong>  
                </div>';
                }
            }
        }
    }
    ?>
                <div class="loginformdiv form_div panel-body col-lg-6">
                    <span class="crtAcnt_up">
                        Login
                    </span>
                    <br>
                    <span class="crtAcnt_dwn">
                        For Fast Ordering and Special Offers
                    </span>
                    <div class="form_content">
                        <form  method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputEmail4">Username *</label>
                                    <input type="text" class="signUpform_ctrl form-control" name="user" id="inputEmail4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="lblForm" for="inputPassword4">Password *</label>
                                    <input type="password" class="signUpform_ctrl form-control" name="pass"id="inputPassword4">
                                </div>
                            </div>
                            
                            <br>
                            <div class=" form-row">
                                    <button class="loginbtn reserveBtn btn" type="submit" name="submitlogin">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>