<?php
    include("DB.php");
?>
<?php
    if ( $_GET['type']=="item"){
        $id= $_GET['id'];
        $rows=$db->getRows("select * from item where itemID = ?",array($id));
        foreach($rows as $items){                       
        }
        echo json_encode($items);
    }
    else if ( $_GET['type']=="cat"){
        $id= $_GET['id'];
        $rows=$db->getRows("select * from menu where menuID = ?",array($id));
        foreach($rows as $items){                       
        }
        echo json_encode($items);
    } 
    else if ( $_GET['type']=="admin"){
        $id= $_GET['id'];
        $rows=$db->getRows("select * from admin where id = ?",array($id));
        foreach($rows as $items){                       
        }
        echo json_encode($items);
    } 
    else if ( $_GET['type']=="user"){
        $id= $_GET['id'];
        $rows=$db->getRows("select * from user where id = ?",array($id));
        foreach($rows as $items){                       
        }
        echo json_encode($items);
    } 
?>