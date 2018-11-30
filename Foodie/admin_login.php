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
        <nav class="navbar navbar-expand-lg navbar-light bg-light bglt">
            <img class="navbar-brand" src="images/logo.png">
        </nav>
        <div id="intro" class="">
            <div class="introDiv container">
                <!-- <img src="images/upper_menu.png"> -->
                <br><br>
                <center>
                <?php
                    if ( isset($_POST['submit'])){
                        if ( !empty($_POST['user']) && !empty($_POST['pass'])){
                            $user=$_POST['user'];
                            $pass=$_POST['pass'];

                            $q1="SELECT * FROM `admin` Where `admin_username`=? AND `admin_password`=?";
                            $rows=$db->getRows($q1,array($user, $pass));
                            if(count($rows)>0){
                                foreach($rows as $row){
                                    $dbuser=$row[1];
                                    $dbpass=$row[2];
                                }
                                if ( $user==$dbuser && $pass==$dbpass ){
                                    session_start();
                                    $_SESSION['sess_user']=$user;
                                    header("Location:menu.php");
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
                    
                    <div align="center" class="login_admin col-lg-6">
                       <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="" method="POST">
                                    <br>
                                    <input type="text" name="user" class="form-control" placeholder="Username" required>
                                    <br>
                                    <input type="password" name="pass" class="form-control" aria-describedby="sizing-addon2" placeholder="Password" required>
                                    <br>
                                    <input type="submit" name="submit" class=" reserveBtn btn " value="Sign in">
                                    <br>
                                </form>
                            </div>   
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </body>
</html>