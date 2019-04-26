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
<link rel="stylesheet" href="css/service.css">
<title>services</title>
</head>
<?php include 'include/header.php' ?>
<body>
    <section>
       <div class="services">
           <a href="#" class="briques "data-toggle="modal" data-target="#modalBriques">
                <h4>calcule des biques</h4>
            </a>
            <a href="#" class="carrolages">
                <h4>surface carrolage</h4>
            </a>
       </div>
    </section>
    <!-- MODAL BRQUES 1 -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" id="modalBriques">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Calucule de briques et derivees</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="post">
                        <div class="form-group">
                            <select name="typeBrique" id="typeBrique" class="form-control">
                                <option>Briques 12 Plaine</option>
                                <option>Briques 15 Plaine</option>
                                <option>Briques 12 creuse</option>
                                <option>Briques 15 creuse</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md">
                                <input type="number" name="longueurMur" placeholder="Saisir la longueur (Le lineique du plan )" class="form-control">
                            </div>
                            <div class="form-group col-md">
                                <input type="number" name="longueurMur" placeholder="Saisir la La hauteur (en maitre)"class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="calculer" class="btn btn-outline-success">
                    <button type="buttom" class="btn btn-outline-danger">fermer</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL BRQUES 1 -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" id="modalBriques">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Calucule de briques et derivees</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="post">
                        <div class="form-group">
                            <select name="typeBrique" id="typeBrique" class="form-control">
                                <option>Briques 12 Plaine</option>
                                <option>Briques 15 Plaine</option>
                                <option>Briques 12 creuse</option>
                                <option>Briques 15 creuse</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md">
                                <input type="number" name="longueurSurf" placeholder="Saisir la longueur (Le lineique du plan )" class="form-control">
                            </div>
                            <div class="form-group col-md">
                                <input type="number" name="longueurSurf" placeholder="Saisir la La hauteur (en maitre)"class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="calculer" class="btn btn-outline-success">
                    <button type="buttom" class="btn btn-outline-danger">fermer</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>