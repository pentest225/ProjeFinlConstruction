<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profil.css">
    <title>Document</title>
</head>
<body>
    <div class="principale">
        <div class="row">
            <div class="col-md-3 divLeft">
                <div class="divImage">
                    <img src="../../images/imagesUser/<?=$resNumExit[0]['image']?>" alt=""  width="130px" height="100px" class="rounded-circle">

                    <div style="font-size: 40px">
                        <a href=""><i class="fas fa-user-cog"></i></a>
                    </div>
                    <div class="seting" style="font-size: 25px">
                        <div class="row"> 
                            <div class="col-sm"><a href="index.php"><i class="fas fa-sign-out-alt"></i></a></div>
                            <div class="col-sm"><a href="modif.php"><i class="fas fa-user-edit"></i></a></div>
                        </div>
                    </div>
                </div>