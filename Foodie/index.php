<?php
    include("DB.php");
    session_start();
    
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
    <div class="hdrhdr"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bglt">
        <img class="navbar-brand" src="images/logo.png">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
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
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                    </a>
                    <div class="dropdown_login dropdown-menu dropdown-menu-right">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout_user.php">Logout</a>
                        
                    </div>
                </li>
                <!--<li class="nav-item ">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>-->
            </ul>
        </div>
    </nav>


    
    <div id="welcome" class="welcome">
        <div class="welcomeDiv container">
            <span class="textWelcome"> Welcome to</span>
            <br>
            <span class="whiteTxt welHead"> Ristorante Italian Cuisine</span>
            <br>
            <span class="whiteTxt underWelTxt"> HOME OF THE BEST ITALIAN FOOD</span>
            <br><br><br>
        </div>
    </div>
    <div id="intro" class="intro">
        <div class="introDiv container">
            <img src="images/upper_menu.png">
            <br><br>
            <span class="textWelcome"> Introduction</span>
            <br>
            <span class="blackTxt welHead "> Speciality of our dine</span>
            <br>
            <img class="linne" src="images/line_menu.png">
            <br><br>
            <div class="blackTxt introTxt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna alique. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo.</div>
            <br><br>
            <button class="reserveBtn btn">VIEW MENU</button>
        </div>
    </div>

    <div id="book" class="book">
        <center>
            <div class="bookDiv container">
                <span class="textWelcome"> Book a table</span>
                <br>
                <span class="whiteTxt welHead "> Make a Reservation</span>
                <br><br><br><br>
                <div class="container">
                    <form class="ng-pristine ng-valid">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <!--<label>Date</label>-->
                                    <br>
                                    <div class="input-group">
                                        <input type="date" name="" max="3000-12-31" min="1000-01-01" class="form-control"
                                            placeholder="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <!--<label>Time</label>-->
                                    <br>
                                    <div class="input-group">
                                        <br>
                                        <input type="time" name="" class="form-control" placeholder="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <!--<label>Person</label>-->
                                    <br>
                                    <div class="input-group">
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <button type="" class="formSubmit reserveBtn btn">FIND TABLE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </center>
    </div>
    <div id="menu" class="menu">
        <center>
            <div class="menuDiv">
                <span class="textWelcome"> Our Menu</span>
                <br>
                <span class="blackTxt welHead "> Choose Your Dish</span>
                <br>
                <img class="linne" src="images/line_menu.png">
                <br><br><br><br><br><br>
                <nav class="menuNav col-12">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <?php
                    $i=0;
                     $rows=$db->getRows("select * from menu ",array());
                     foreach($rows as $items){
                         $r = str_replace(' ', '_', $items[1]);
                         $c=count($rows);
                         (int)$c=12/2;
                         
                         if ( $i==0 ){
                            echo'<a class=" col-lg-'.$c.' col-12 nav-item nav-link active" id="nav-'.$r.'-tab" data-toggle="tab" href="#nav-'.$r.'"
                                role="tab" aria-controls="nav-'.$r.'" aria-selected="true">'.$items[1].'</a>';
                         }
                        else{
                            echo'<a class=" col-lg-'.$c.' col-12 nav-item nav-link" id="nav-'.$r.'-tab" data-toggle="tab" href="#nav-'.$r.'"
                                role="tab" aria-controls="nav-'.$r.'" aria-selected="false">'.$items[1].'</a>';
                        }
                        $i++;
                     }
                     
                ?>
                 </div>
                </nav>
               
                <br><br>
                <div class="">
                   
                    
                <div class="menutable tab-content" id="nav-tabContent">
                     <!-- ////////////////// -->
                <?php
                    $ii=0;
                     $x=$db->getRows("select * from menu ",array());
                     foreach($x as $y){
                         $r = str_replace(' ', '_', $y[1]);
                        if ($ii==0){
                                echo' <div class="tab-pane fade show active" id="nav-'.$r.'" role="tabpanel" aria-labelledby="nav-'.$r.'-tab">
                                        <div class="container-fluid">
                                        <div class="row justify-content-md-center">';
                                        $i=0;
                                        $rows=$db->getRows("select * from item where type = ?",array($y[1]));
                                        foreach($rows as $items){
                                                echo'
                                                    <div class="col col-lg-5 col-md-10 col-sm-10 col-xs-10">
                                                        <div class="carbonads">
                                                            <span>
                                                                <br><Br>
                                                                <div class="carbon-wrap">';
                                                                if ( $items[5] != NULL)
                                                               echo'<img class="item_Pic" src="images/itemsImgs/'.$items[5].'" alt="">';
                                                                else
                                                               echo'<img class="item_Pic" src="images/icon.ico" alt="">';
                                                                    echo'
                                                                    <span class="item_title">
                                                                        <span class="itemTitle_name">'.$items[1].'</span>  <span class="itemPrice">'.$items[4].'LE</span>
                                                                    </span>
                                                                    <br>
                                                                    <span class="item_info">
                                                                        '.$items[2].'
                                                                    </span>
                                                                    <span class="item_price">                                                         <br>
                                                                        <button type="button" onclick="getAjax('.$items[0].');"class="orderBtn reserveBtn btn " data-toggle="modal" data-target="#exampleModalCenter">
                                                                            Order
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>';                                
                                                    $i++;
                                                }
                                                if ( count($rows)%2!=0){
                                                    echo'
                                                    <div class="col col-lg-5 col-md-10 col-sm-10 col-xs-10">
                                                        <div class="carbonads">
                                                            <span>
                                                                <br><Br>
                                                                <div class="carbon-wrap">
                                                                    <span class="item_title">
                                                                        <span class="itemTitle_name"></span>  <span class="itemPrice"></span>
                                                                    </span>
                                                                    <br>
                                                                    <span class="item_info">
                                                                    </span>
                                                                    <span class="item_price">                                                         
                                                                    <br>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>';       
                                                }
                        }
                        else{
                            echo' <div class="tab-pane fade  " id="nav-'.$r.'" role="tabpanel" aria-labelledby="nav-'.$r.'-tab">
                                        <div class="container-fluid">
                                        <div class="row justify-content-md-center">';
                                        $i=0;
                                        $rows=$db->getRows("select * from item where type = ?",array($y[1]));
                                        foreach($rows as $items){
                                                echo'
                                                    <div class="col col-lg-5 col-md-10 col-sm-10 col-xs-10">
                                                        <div class="carbonads">
                                                            <span>
                                                                <br><Br>
                                                                <div class="carbon-wrap">';
                                                                if ( $items[5] != NULL)
                                                               echo'<img class="item_Pic" src="images/itemsImgs/'.$items[5].'" alt="">';
                                                                else
                                                               echo'<img class="item_Pic" src="images/icon.ico" alt="">';
                                                                    echo'
                                                                    <span class="item_title">
                                                                        <span class="itemTitle_name">'.$items[1].'</span>  <span class="itemPrice">'.$items[4].'LE</span>
                                                                    </span>
                                                                    <br>
                                                                    <span class="item_info">
                                                                        '.$items[2].'
                                                                    </span>
                                                                    <span class="item_price">                                                         <br>
                                                                        <button type="button" onclick="getAjax('.$items[0].');"class="orderBtn reserveBtn btn "  data-toggle="modal" data-target="#exampleModalCenter">
                                                                            Order
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>';                                
                                                    $i++;
                                                }
                                                if ( count($rows)%2!=0){
                                                    echo'
                                                    <div class="col col-lg-5 col-md-10 col-sm-10 col-xs-10">
                                                        <div class="carbonads">
                                                            <span>
                                                                <br><Br>
                                                                <div class="carbon-wrap">
                                                                    <span class="item_title">
                                                                        <span class="itemTitle_name"></span>  <span class="itemPrice"></span>
                                                                    </span>
                                                                    <br>
                                                                    <span class="item_info">
                                                                    </span>
                                                                    <span class="item_price">                                                         
                                                                    <br>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>';       
                                                }
                        }
                        $ii++;
                        echo'  </div>
                            </div>
                        </div>';
                     }
                     
                ?>





                    <!-- ///////////////////////////// -->
                </div>
            </div>
            <a class="imgcart" href="allCart.php">
                <label class="imgcartlabel">
                    <img class="imgcart_png"src="images/cart.png">
                </label>
            </a>
        </center>
    </div>
    
    <!-- Change Qty -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="popupAddToCart">
                <div class="modal-header">
                   
                    <div class="mealDetails row">
                        <div class="col-md-12">
                            <figure class="thumb_menu_list"><img class="rest_image_path" id="popupImg"src="images/icon.ico"alt="thumb"></figure>
                            <h5 class="popup_title" id="exampleModalCenterTitle"></h5>
                            <p class="desc_popup"id="descriptionItem" class="restInfo margin-bottom-5"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                <br>
                            <section class="cart-btn-group">
                                <button type="button" onclick="decreaseQty();" class="btn btn-sm btn-plus-input">
                                        <i style='font-size:24px' class='fas'>&#xf068;</i>
                                </button>
                                <input type="text" min="1"value="1" onchange="checkQutIsNum();"placeholder="Quantity" id="qty" name="qty" class="meal_qty">
                                <button type="button" onclick="increaseQty();"class="btn btn-sm btn-minus-input">
                                        <i style='font-size:24px' class='fas'>&#xf067;</i>
                                    </button>
                            </section>
                </div>
                <div class="modal-footer">
                    <button  onclick='' name="addToCart" class="cartOrder orderBtn reserveBtn btn">Add to cart</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        function increaseQty(){
            var qty = $("#qty").val();
            $("#qty").val(++qty);
        }
        function decreaseQty(){
            var qty = $("#qty").val();
            if ( qty>=2)
                $("#qty").val(--qty);
        }
        function checkQutIsNum(){
            var qty = $("#qty").val();
            if ( /^\d+$/.test(toString(qty)) )
                $("#qty").val(qty);
            else //( isNaN(qty) || /\s/.test(toString(qty)))
                $("#qty").val(1);
        }
        function getAjax( itemID){
            $("#qty").val(1);
            var id = itemID;
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "data.php?id="+id;
            
            console.log(id);
            var asynchronons = true ; 
            ajax.open(method, url, asynchronons);
            ajax.send();
            ajax.onreadystatechange= function (){
                if ( this.readyState == 4  && this.status == 200){
                    var v = JSON.parse(this.responseText);
                    console.log(v);
                    $("#exampleModalCenterTitle").html(v['itemName']);
                    $("#descriptionItem").html(v['description'])
                    if ( !v[5]){
                        $("#popupImg").attr('src','images/icon.ico');
                    }
                    else{
                        var src="images/itemsImgs/"+v['img'];
                        $("#popupImg").attr('src',src);
                    }
                    //$("#popupAddToCart").html(data);
                    $('.cartOrder').attr('onclick', 'window.location.href="addToCart.php?id='+ id +'"' );
                }
            }
        }
    </script>
    <div class="kitchen">
        <div class="kitchenDiv container-fluid">
            <center>
                <br>
                <span class="textWelcome"> Clmaging</span>
                <br>
                <span class="blackTxt welHead "> Kitchen Experts</span>
                <br>
                <br><br>
                <div class="row card-deck">
                <?php
                        $i=0;
                        $rows=$db->getRows("select * from expert ",array());
                        foreach($rows as $chefs){
                                echo'
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">';
                        if ( $chefs[3]!=NULL )                        
                            echo '<img class="card-img-top" src="images/chefImgs/'.$chefs[3].'"alt="'.$chefs[1].'">';
                        else
                            echo '<img class="card-img-top" src="images/icon.ico"alt="Card image cap">';
                            echo'
                            <div class="card-footer">
                                <div class="chef_info">
                                    <span class="name">'.$chefs[1].'</span>
                                    <br>
                                    <span class="job">'.$chefs[2].'</span>
                                </div>
                                <div class="sm_info">';
                            if ( $chefs[4]!=NULL )
                                echo'<a href="'.$chefs[4].'"><img class="sm_scon" src="images/facebook.png"></a>';
                            if ( $chefs[5]!=NULL )
                                echo'<a href="'.$chefs[4].'"><img class="sm_scon" src="images/twitter.png"></a>';
                            if ( $chefs[6]!=NULL )
                                echo'<a href="'.$chefs[4].'"><img class="sm_scon" src="images/linkedin.png"></a>';
                            if ( $chefs[7]!=NULL )
                                echo'<a href="'.$chefs[4].'"><img class="sm_scon" src="images/G+.png"></a>';
                                echo'
                                </div>
                            </div>
                        </div>
                    </div>';

                    $i++;
                        }
                    ?>
                </div>
            </center>
        </div>
    </div>
    
    <div id="welcome" class=" review">
        <center class="revDiv">
            <div id="carouselExampleIndicators" class="carousel_pad carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="reviewDiv container">
                            <img src="images/stars.png">
                            <br>
                            <span class="whiteTxt underWelTxt"> Cattle. And was. Fourth be appear. thing lesser
                                replenish evening called void a, see blessed meat fourth called moveth place behold
                                night own night third in they're abundantiy.</span>
                            <br><br><br><br>
                            <img class="reviewPic" src="images/reviewPic.png">
                            <br>
                            <span class="rewiewName">Jackline Rocky</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="reviewDiv container">
                            <img src="images/stars.png">
                            <br>
                            <span class="whiteTxt underWelTxt"> Cattle. And was. Fourth be appear. thing lesser
                                replenish evening called void a, see blessed meat fourth called moveth place behold
                                night own night third in they're abundantiy.</span>
                            <br><br><br><br>
                            <img class="reviewPic" src="images/reviewPic.png">
                            <br>
                            <span class="rewiewName">Jackline Rocky</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="reviewDiv container">
                            <img src="images/stars.png">
                            <br>
                            <span class="whiteTxt underWelTxt"> Cattle. And was. Fourth be appear. thing lesser
                                replenish evening called void a, see blessed meat fourth called moveth place behold
                                night own night third in they're abundantiy.</span>
                            <br><br><br><br>
                            <img class="reviewPic" src="images/reviewPic.png">
                            <br>
                            <span class="rewiewName">Jackline Rocky</span>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="reviewDiv container">
                            <img src="images/stars.png">
                            <br>
                            <span class="whiteTxt underWelTxt"> Cattle. And was. Fourth be appear. thing lesser
                                replenish evening called void a, see blessed meat fourth called moveth place behold
                                night own night third in they're abundantiy.</span>
                            <br><br><br><br>
                            <img class="reviewPic" src="images/reviewPic.png">
                            <br>
                            <span class="rewiewName">Jackline Rocky</span>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
    
    
    <div class="news container-fluid">
        <center>
            <div class="newsDiv">
                <span class="textWelcome"> News</span>
                <br>
                <span class="blackTxt welHead "> Latest News</span>
                <br>
                <img class="linne" src="images/line_menu.png">
                <br><br><br>
                <div class=" row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="images/news_pic.png" alt="Card image cap">
                            <div class="sm_tab">
                                <div class="row ">
                                    <div class="colIII" width="70%" style="padding-top:15px;margin-bottom: 25px;">
                                        <img src="images/man.png">
                                        <span style="font-size: 12px;">By Adam</span>
                                    </div>
                                    <div class="colIII" width="30%" style="margin-top: -25px">
                                        <img src="images/date.png">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footerII card-footer">
                                <div class="chef_info">
                                    <span class="smm blackTxt welHead  ">Good Time For A Barbecue</span>
                                    <br>
                                    <span class="job">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna alique. </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="images/news_pic.png" alt="Card image cap">
                            <div class="sm_tab">
                                <div class="row">
                                    <div class="colIII" width="70%" style="padding-top:15px;margin-bottom: 25px;">
                                        <img src="images/man.png">
                                        <span style="font-size: 12px;">By Adam</span>
                                    </div>
                                    <div class="colIII" width="30%" style="margin-top: -25px">
                                        <img src="images/date.png">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footerII card-footer">
                                <div class="chef_info">
                                    <span class="smm blackTxt welHead  ">Good Time For A Barbecue</span>
                                    <br>
                                    <span class="job">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna alique. </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="images/news_pic.png" alt="Card image cap">
                            <div class="sm_tab">
                                <div class="row">
                                    <div class="colIII" width="70%" style="padding-top:15px;margin-bottom: 25px;">
                                        <img src="images/man.png">
                                        <span style="font-size: 12px;">By Adam</span>
                                    </div>
                                    <div class="colIII" width="30%" style="margin-top: -25px">
                                        <img src="images/date.png">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footerII card-footer">
                                <div class="chef_info">
                                    <span class="smm blackTxt welHead  ">Good Time For A Barbecue</span>
                                    <br>
                                    <span class="job">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna alique. </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </center>
    </div>
    <div class="end map ">
        <center>
            <div class="endd row">
                <div class="sp col-lg-4">
                    <span style="font-size: 27px;" class="down_info smm blackTxt welHead sm">About us</span>
                    <br><br><br>
                    <span class="down_info_info job">For far away, behind the word mountains, far from the countries
                        Vokalia and <span class="b">Conso Nantia</span> there live the blind texts</span>
                </div>
                <div class="sp col-lg-4">
                    <span style="font-size: 27px;" class="down_info smm blackTxt welHead sm">Opening Hours</span>
                    <br><br><br>
                    <span class="down_info_info job"><span class="b">Mon-Thu:</span> 7:00am-8:00pm</span>
                    <br>
                    <span class="down_info_info job"><span class="b">Fri-Sun</span> 7:00am-10:00pm</span>
                </div>
                <div class=" sp col-lg-4">
                    <span style="font-size: 27px;" class="down_info smm blackTxt welHead  ">Contact Info</span>
                    <br><br><br>
                    <span class="down_info_info job"><span class="b">Call us:</span>091 552 6580</span>
                    <br>
                    <span class="down_info_info job"><span class="b">Mail us:</span>contact@foodie.com</span>
                </div>
            </div>
        </center>
    </div>

</body>

</html>