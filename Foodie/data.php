<?php
    include("DB.php");
?>
<?php
    $id= $_GET['id'];
    $rows=$db->getRows("select * from item where itemID = ?",array($id));
    foreach($rows as $items){                       
    }
    echo json_encode($items);
              
?>