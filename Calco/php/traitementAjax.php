<?php 
    require '../class/dataBase.php';
    require '../class/function.php';
    $db=DataBase::connect();

    if(isset($_POST))
    {
        extract($_POST);
       $insert=$db->prepare('SELECT * FROM plan WHERE type = ?');
       $insert->execute(array($type));
       $res=$insert->fetchAll();
        echo json_encode($res);
    }

?>