<?php include '../../php/inscriptionClient.php' ?>
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
<link rel="stylesheet" href="../../css/inscription.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<title>construction</title>
</head>
<body>
<?php include '../include/headerViews.php' ?>

<div class="principale">
    <div class="contenu">
        <div class="form">
                    <form action="php/AjaxInscription.php" method="post" enctype="multipart/form-data" id='emtrepreneur'>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="nom" id="" placeholder="Nom" class="form-control fas fa-user" >
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="prenom" id="" placeholder="prenom" class="form-control fas fa-user" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="Numero" name="num" id="" class="form-control" placeholder="Numero">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" id="" class="form-control" placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="ville" id="" class="form-control" placeholder="ville">
                            </div>
                        </div>
                        <div class="col-sm">
                        <div class="form-group">
                                <input type="text" name="commune" id=""  class="form-control" placeholder="commune">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photo" id="" class="form-control" placeholder="charger une image de profil">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="condition" id="">
                        <a>j'accepte les comdition d'utilisation</a>
                    </div>
                </div>
    </div>            
</div>
</div>
<?php include '../../assert/include/footer.php' ?>
</body>
</html>
