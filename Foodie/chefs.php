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
    $cat=$_GET['cat'];
    if(isset($_GET['submit'])){
        
        //echo 'testttttt';
        $name=$_GET['itemName'];
        $description = $_GET['description'];
        $price=$_GET['price'];
        $img=$_GET['img'];
        $type=$_GET['cat'];
        $id='';
        //echo "<h1>$name </h1><br> <h1>$description </h1><br> <h1>$price </h1><br> <h1>$img </h1><br> <h1>$type </h1><br> <h1>____$id </h1>";

        $q="INSERT INTO `item` VALUES ( ?, ?, ?, ?, ?, ?)";
        $done = $db->queryOp($q,array($id, $name, $description, $type, $price, $img)); 
        
    }
    if ( isset($_GET['submitEdit'])){

        $name=$_GET["itamName_edit"];
        $description=$_GET["description_edit"];
        $price=$_GET["price_edit"];
        
        if ($_GET["image_edit"]==NULL){
            $img=$_GET["img_hdn"];
        }
        else{
            $img=$_GET["image_edit"];
        }
        if ( isset($_GET['delimg'])){
            $img=NULL;
        }
        $id=$_GET["id_edit"];
        $type=$_GET['cat'];
        //echo "<h1>1$name </h1><br> <h1>______$description </h1><br> <h1>3$price </h1><br> <h1>4))$img </h1><br> <h1>5$type </h1><br> <h1>6____$id </h1>";
        

        $q="UPDATE item SET itemName=?, description=?, price=?, img=? WHERE itemID= ?;";
        $done = $db->queryOp($q,array($name, $description, $price, $img, $id)); 

    }

    if ( isset($_GET['delsubmit'])){
        $id=$_GET["id_del"];
        $type=$_GET['cat'];
        //echo "<h1>1$name </h1><br> <h1>2$description </h1><br> <h1>3$price </h1><br> <h1>4$img </h1><br> <h1>5$type </h1><br> <h1>6____$id </h1>";

        $q="DELETE FROM `item` WHERE itemID= ? ;";
        $done = $db->queryOp($q,array($id)); 

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
                <li class="nav-item ">
                    <a class="nav-link" href="admins.php">Admins <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
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
                    <label class="studName">Name</label>
                </th>
                <th>
                    <label class="studName">Job position</label>
                </th>
                <th>
                    <label class="studName">Image</label>
                </th>
                <th>
                    <label class="studName">facebook</label>
                </th>
                <th>
                    <label class="studName">twitter</label>
                </th>
                <th>
                    <label class="studName">LinkedIn</label>
                </th>
                <th>
                    <label class="studName">Google+</label>
                </th>
                <th></th>
                <th></th>
            </tr>
            <tr class="tr-add">
                <form action="items.php" method="GET">
                    <td>
                        <div class="countainer">
                            <input name="name" class="additem form-control" type="text" required>
                        </div>
                    </td>
                    <td>
                        <div class="countainer">
                            <input name="job" class="additem form-control" type="text" required>
                        </div>
                    </td>
                    <td>
                        <div class="countainer">
                            <input class="additem form-control" name="img"type="file" accept="image/x-png,image/gif,image/jpeg">
                        </div>
                    </td>
                    <td>
                        <div class="countainer">
                            <input name="fb" class="additem form-control" type="text" >
                        </div>
                    </td>
                    <td>
                        <div class="countainer">
                            <input name="tw" class="additem form-control" type="text" >
                        </div>
                    </td>
                    <td>
                        <div class="countainer">
                            <input name="in" class="additem form-control" type="text" >
                        </div>
                    </td>
                    <td>
                        <div class="countainer">
                            <input name="go" class="additem form-control" type="text" >
                        </div>
                    </td>
                    <td>
                        <button type="submit" name="submit" class="orderBtn reserveBtn btn "> Add chef</button>
                    </td>
                </form 
            </tr>
            <?php
            $rows= array();
            $q1="SELECT itemName, description, price, img ,itemID FROM `item` WHERE type = ?";
            $rows=$db->getRows($q1,array($cat));
            if(count($rows)>0){
                  $i=1;
                foreach($rows as $row)
                 {
                    
                echo "
                <tr > 
                    <td> 
                        <br>
                        <span id=\"semesterName_$i\">$row[0]</span>
                        <br>
                        <br>
                    </td>
                    <td> 
                        <br>
                        <span id=\"semesterName_$i\">$row[1]</span>
                        <br>
                        <br>
                    </td>
                    <td> 
                        <br>
                        <span id=\"semesterName_$i\">$row[2] LE</span>
                        <br>
                        <br>
                    </td>
                    <td> 
                        <br>
                        <span id=\"semesterName_$i\">$row[3]</span>
                        <br>
                        <br>
                    </td>
                    <td >
                        <div class=\"row_options\">
                            <button onclick=\"getAjax('$row[4]');\"class=\"editDel btn\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\">
                                
                                Edit
                            </button>
                            <br><br>
                            <button onclick=\"getAjax('$row[4]');\"class=\"editDel btn\" data-toggle=\"modal\" data-target=\"#exampleModalCenterdel\">
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
                <form action="items.php" method="GET">
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
                                    <label>Item Name </label>  
                                </td>
                                <td>
                                    <input class="additem form-control" type="text" id="itamName_edit" name="itamName_edit" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label>Item description </label>  
                                </td>
                                <td>
                                <textarea class="additem form-control" type="text" id="description_edit"name="description_edit" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label>Item Price </label>  
                                </td>
                                <td>
                                <input class="additem form-control" type="number" id="price_edit"name="price_edit" required >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Item image </label>  
                                </td>
                                <td>
                                <input class="additem form-control" type="file" id="image_edit"name="image_edit" accept="image/x-png,image/gif,image/jpeg">
                                <br>
                                <input type="checkbox" name="delimg" value="del"> <span class="delImg">Delete image</span>    
                            </td>
                            </tr>
                        </table>
                    </center>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_edit"name="id_edit">
                        <input type="hidden" id="cat_edit"name="cat">
                        <input type="hidden" id="img_hdn"name="img_hdn">
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
                        <input type="hidden" id="cat_del"name="cat">                   
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
            console.log("_______"+name);
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "editdel.php?id="+id+"&type=item";
            //console.log(name);
            var asynchronons = true ; 
            ajax.open(method, url, asynchronons);
            ajax.send();
            ajax.onreadystatechange= function (){
                if ( this.readyState == 4  && this.status == 200){
                    var v = JSON.parse(this.responseText);
                    console.log(v);
                    $("#itamName_edit").val(v['itemName']);
                    $("#description_edit").val(v['description']);
                    $("#price_edit").val(v['price']);
                    $("#img_hdn").val(v[5]);
                    $("#id_edit").val(v[0]);
                    $("#id_del").val(v[0]);
                    $("#cat_edit").val(v[3]);
                    $("#cat_del").val(v[3]);
                }
            }
        }
    </script>

</html>