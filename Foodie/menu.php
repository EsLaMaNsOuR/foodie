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
    //$cat=$_GET['cat'];
    if(isset($_GET['submit']))
    {
        
        //echo 'testttttt';
        $name=$_GET['name'];
        $id='';
        //echo "<h1>$name </h1><br> <h1>$description </h1><br> <h1>$price </h1><br> <h1>$img </h1><br> <h1>$type </h1><br> <h1>____$id </h1>";

        $q="INSERT INTO `menu` VALUES ( ?, ?)";
        $db->queryOp($q,array($id, $name));  
    }
    if ( isset($_GET['submitEdit'])){
        $catname=$_GET["catName_edit"];
        $id=$_GET["id_edit"];
        $oldCatName=$_GET['cat_old_edit'];
        //echo "<h1>)))__$catname </h1><br> <h1>_______$id </h1>";

        $q="UPDATE menu SET name=? WHERE menuID= ?;";
        $done = $db->queryOp($q,array($catname, $id)); 

        $qq="UPDATE item SET type=? WHERE type=?;";
        $done = $db->queryOp($qq,array($catname, $oldCatName)); 


    }

    if ( isset($_GET['delsubmit'])){
        $id=$_GET["id_del"];
        $name=$_GET["catName_del"];
        //echo "<h1>6____$id </h1>";

        $q="DELETE FROM `menu` WHERE menuID= ? ;";
        
        $qq="DELETE FROM `item` WHERE type= ? ;";
        $done = $db->queryOp($q,array($id)); 

        $done = $db->queryOp($qq,array($name)); 

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
                <li class="nav-item active">
                    <a class="nav-link" href="menu.php">Menu <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
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
        // if(isset($_GET['submit']))
        // {
        //     $rows= array();
        //     $q1="SELECT *  FROM `menu` WHERE name = ?";
        //     $rows=$db->getRows($q1,array($name));
        //     if(count($rows)>0){
        //         $i=1;
        //         foreach($rows as $row){
        //             if ( $name!=$row[1] ){
        //                 echo '<div class="alert alert-success">
        //                 <strong>'.$row[1].'</strong> added successfuly
        //               </div>';
        //             }
        //             else{
        //                 echo'<div class="alert alert-danger">
        //                 <strong>'.$row[1].'</strong> wasn\'t added 
        //               </div>';
        //             }
        //         }
        //     }
        // }else{
        //     echo '<div class="alert">
        //     </div>';
        // }
            
    ?>
        <div class="alert">
             </div>
        <table class="table">
            <tr class="quesRow" scope="row">
                <th>
                    <label class="studName"> Category </label>
                </th>
                <th></th>
                <!-- <th></th> -->
            </tr>
            <tr class="tr-add">
                <form action="menu.php" method="GET">
                    <td>
                        <div class="countainer">
                            <input name="name"class="additem form-control" type="text">
                        </div>
                    </td>
                    <!-- <td>
                    </td> -->
                    <td>
                        <button type="submit" name="submit" class="orderBtn reserveBtn btn "> Add Category</button>
                    </td>
                </form 
            </tr>
            <?php
            $rows= array();
            // all of semsters 
            $q1="SELECT * FROM `menu`;";
            $rows=$db->getRows($q1,array());
            if(count($rows)>0){
                  $i=1;
                foreach($rows as $row)
                 {
                    
                echo "
                <tr > 
                    <td  class='click-row' onclick=\"window.location.href = 'items.php?cat=$row[1]'\"> 
                        <br>
                        <span id=\"semesterName_$i\">$row[1]</span>
                        <br>
                        <br>
                    </td>
                    
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
                </tr>
                ";
                $i++;
                }
            }
            ?>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <nav class=" nav navbar-bottom">
    </nav>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="  editdelpopup modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="popupAddToCart">
                <form >
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
                                    <label>Category Name </label>  
                                </td>
                                <td>
                                    <input class="additem form-control" type="text" id="catName_edit" name="catName_edit" required>
                                </td>
                            </tr>
                            
                        </table>
                    </center>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_edit"name="id_edit">
                        <input type="hidden" id="cat_old_edit"name="cat_old_edit">
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
                    <p class="desc_popup"id="" class="restInfo margin-bottom-5"> Are you want to delete this category ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_del"name="id_del">     
                        <input type="hidden" id="catName_del" name="catName_del" >         
                        <button type="submit" name="delsubmit"class="orderBtn reserveBtn btn ">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
        function getAjax(id){
            var name = id;
            console.log("_______"+name);
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "editdel.php?id="+id+"&type=cat";
            //console.log(name);
            var asynchronons = true ; 
            ajax.open(method, url, asynchronons);
            ajax.send();
            ajax.onreadystatechange= function (){
                if ( this.readyState == 4  && this.status == 200){
                    var v = JSON.parse(this.responseText);
                    console.log(v);
                    $("#catName_edit").val(v[1]);
                    $("#catName_del").val(v[1]);
                    $("#cat_old_edit").val(v[1]);
                    $("#id_edit").val(v[0]);
                    $("#id_del").val(v[0]);
                    
                }

            }
        }
    </script>
</html>