<?php
    include("DB.php");
    session_start();
    if ( !isset($_SESSION['sess_user'])){
        header("Location:admin_login.php");
    }else{
        $user=$_SESSION['sess_user'];
    }
?>
<?php
    
    if(isset($_GET['submit'])){
        
        //echo 'testttttt';
        $name_add=$_GET['user'];
        $pass_add=$_GET['pass'];
        $id_add='';
        //echo "<h1>$name </h1><br> <h1>$description </h1><br> <h1>$price </h1><br> <h1>$img </h1><br> <h1>$type </h1><br> <h1>____$id </h1>";

        $q="INSERT INTO `admin` VALUES ( ?, ?, ?)";
        $done = $db->queryOp($q,array($id_add, $name_add, $pass_add)); 
        
    }
    if ( isset($_GET['submitEdit'])){

        $name_edit=$_GET["user_edit"];
        $pass_edit=$_GET["pass_edit"];
        $id_edit=$_GET["id_edit"];
        //echo "<h1>1$name </h1><br> <h1>______$description </h1><br> <h1>3$price </h1><br> <h1>4))$img </h1><br> <h1>5$type </h1><br> <h1>6____$id </h1>";
        

        $q="UPDATE admin SET admin_username=?, admin_password=? WHERE id= ?;";
        $done = $db->queryOp($q,array($name_edit, $pass_edit, $id_edit)); 

    }

    if ( isset($_GET['delsubmit'])){
        $id_del=$_GET["id_del"];
        //echo "<h1>1$name </h1><br> <h1>2$description </h1><br> <h1>3$price </h1><br> <h1>4$img </h1><br> <h1>5$type </h1><br> <h1>6____$id </h1>";

        $q="DELETE FROM `admin` WHERE id= ? ;";
        $done = $db->queryOp($q,array($id_del)); 

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
    <link rel="stylesheet" href="css/menu/css/rtl.css">
    <link rel="stylesheet" href="css/rtl.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.css"></script>
    <script src="js/bootstrap.min.js"></script>
     
</head>

<body>
    <div class="hdrhdr"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bglt">
        <img class="navbar-brand" src="images/logo.png">
        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">-->
        <!--  <span class="navbar-toggler-icon"></span>-->
        <!--</button>-->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" href="menu.php">Menu <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admins.php">Admins <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="users.php">Users <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="chefs.php">Chefs <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item ">
                    <!-- <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a> -->

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                        <?php echo $user?>
                    </a>
                    <div class="dropdown_login dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
                <!--<li class="nav-item ">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>-->
            </ul>
        </div>
    </nav>
    
    <div align="center">
    <?php
        if(isset($_GET['submit']))
        {
            $rows= array();
            $q1="SELECT *  FROM `item` WHERE itemName = ?";
            $rows=$db->getRows($q1,array($name));
            if(count($rows)>0){
                $i=1;
                foreach($rows as $row){
                    if ( $name==$row[1] && $description == $row[2] && $type==$row[3] && $price==$row[4] && $img==$row[5]){
                        echo '<div class="alert alert-success">
                        <strong>'.$row[1].'</strong> added successfuly
                      </div>';
                    }
                    else{
                        echo'<div class="alert alert-danger">
                        <strong>'.$row[1].'</strong> wasn\'t added 
                      </div>';
                    }
                }
            }
        }else{
            echo '<div class="alert">
            </div>';
        }
            
    ?>
        <table class="table">
        
            <tr class="quesRow" scope="row">
            
                <th>
                    <label class="studName">Username</label>
                </th>
                <th>
                    <label class="studName">Password</label>
                </th>
               
                <th></th>
                <th></th>
            </tr>
            <tr class="tr-add">
                <form action="admins.php" method="GET">
                    <td>
                        <div class="countainer">
                            <input name="user" class="additem form-control" type="text" required>
                        </div>
                    </td>
                    <td>
                        <div class="countainer">
                            <input name="pass" class="additem form-control" type="text" required>
                        </div>
                    </td>
                    <td>
                            <button type="submit" name="submit" class="orderBtn reserveBtn btn "> Add admin</button>
                    </td>
                </form 
            </tr>
            <?php
            $rows= array();
            $q1="SELECT * FROM `admin` ";
            $rows=$db->getRows($q1,array());
            if(count($rows)>0){
                  $i=1;
                foreach($rows as $row)
                 {
                echo "
                <tr > 
                    
                    <td> 
                        <br>
                        <span id=\"semesterName_$i\">$row[1]</span>
                        <br>
                        <br>
                    </td>
                    <td> 
                        <br>
                        <span id=\"semesterName_$i\">$row[2]</span>
                        <br>
                        <br>
                    </td>
                   
                    <td >
                        <div class=\"row_options\">
                            <button onclick=\"getAjax('$row[0]');\"class=\"editDel btn\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\">
                                
                                Edit
                            </button>
                            <br><br>
                            <button onclick=\"getAjax('$row[0]');\"class=\"editDel btn\" data-toggle=\"modal\" data-target=\"#exampleModalCenterdel\">
                                Delete
                            </button>
                        </div>
                    </td>
                    <td>
                    </td>
                </tr>
                ";
                $i++;
                }
            }
            ?>
        </table>
    </div>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="  editdelpopup modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="popupAddToCart">
                <form action="admins.php" method="GET">
                    <div class="hdrpopup modal-header">
                        <div class="mealDetails row">
                            <div class="col-md-12">
                                <h5  id=""><strong>Edit</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                    <br>
                    <center>
                        <table>
                            <tr>
                                <td>
                                    <label>Username </label>  
                                </td>
                                <td>
                                    <input class="additem form-control" type="text" id="user_edit" name="user_edit" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label>Password </label>  
                                </td>
                                <td>
                                <input class="additem form-control" type="text" id="pass_edit" name="pass_edit" required>
                                </td>
                            </tr>
                        </table>
                    </center>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_edit"name="id_edit">
                        
                        <button type="submit" name="submitEdit" class="btn orderBtn reserveBtn">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenterdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="popupAddToCart">
                <form>
                    <div class="hdrpopup modal-header">
                        <div class="mealDetails row">
                            <div class="col-md-12">
                                <h5 class="" id=""><strong>Deleteing</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                    <br>
                    <p class="desc_popup"id="" class="restInfo margin-bottom-5"> Are you want to delete this item ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_del"name="id_del">       
                        <button type="submit" name="delsubmit"class="orderBtn reserveBtn btn ">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <nav class=" nav navbar-bottom">
    </nav>

    <script>
        function getAjax(id){
            var id = id;
            console.log("_______"+id);
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "editdel.php?id="+id+"&type=admin";
            //console.log(name);
            var asynchronons = true ; 
            ajax.open(method, url, asynchronons);
            ajax.send();
            ajax.onreadystatechange= function (){
                if ( this.readyState == 4  && this.status == 200){
                    var v = JSON.parse(this.responseText);
                    console.log(v);
                    
                    $("#user_edit").val(v[1]);
                    $("#pass_edit").val(v[2]);
                    $("#id_del").val(v[0]);
                    $("#id_edit").val(v[0]);
                    
                }
            }
        }
    </script>

</html>