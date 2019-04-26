<?php 
    require 'class/dataBase.php';
    require 'class/function.php';
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $db=DataBase::connect();
        $selectMaison=$db->prepare('SELECT image FROM maisons WHERE plan= ?');
        $selectMaison->execute(array($id));
        $resultMaison=$selectMaison->fetchAll();
        $NombreMaison=sizeof(($resultMaison));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/plan.css">
<title>construction</title>
</head>
<body>
<?php include 'include/header.php' ?>
<section class="principale">
    <div id="grandeImage">
        <img src="imagesToUpload/<?=$resultMaison[0]['image']?>" alt="" width="100%" height="auto" id='imagePrincipale'>
    </div>

    <div class="petiteImage">
        <?php foreach ($resultMaison as $maisons):
                $imageMaison=$maisons['image']
            ?>
            <div class="image image1">
                <img src="imagesToUpload/<?=$imageMaison?>" alt="" width="100%" height="auto" class='miniImage'>
            </div>
        <?php endforeach ?>
    </div>
    <a href="service.php" class="btn btn-outline-primary">j'Suis Interaiser</a>                   
</section>
</body>
</html>