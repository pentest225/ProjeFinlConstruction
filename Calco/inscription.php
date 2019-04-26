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
<link rel="stylesheet" href="css/inscription.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<title>construction</title>
<style>
    .contenu{
        margin: 50px;
    }
</style>
</head>
<body>
<?php include 'assert/include/header.php' ?>
<div class="principale">
    <div class="contenu">
        <h3>Améliorez votre quotidien grâce au <strong>Iso-construction</strong></h3>
        <div class="row">
            <div class="col-md info emtrepreneur">
                <h4>j'suis Entrepreneur </h4>
                <ul>
                    <li>Déléguez vos tâches du quotidien</li>
                    <li>Faites-vous aider par des jobeurs compétents et évalués</li>
                    <li>Gagnez du temps et économisez de l’argent</li>
                    <li>Simplifiez-vous la vie et profitez de votre temps libre</li>
                </ul>
                <a class="btn btn-outline-success" href="views/emtrepreneur/inscriptionEmtrepreneur.php">Inscription</a>
            </div>
            <div class="col-md info client">
                <h4>j'veux construire </h4>
                    <ul>
                        <li>Déléguez vos tâches du quotidien</li>
                        <li>Faites-vous aider par des jobeurs compétents et évalués</li>
                        <li>Gagnez du temps et économisez de l’argent</li>
                        <li>Simplifiez-vous la vie et profitez de votre temps libre</li>
                    </ul>
                    <a href="views/users/inscriptionUser.php" class="btn btn-outline-info">Inscription</a>
            </div>
            <div class="col-md info fournisseur">
            <h4>J'suis fournisseur </h4>
                    <ul>
                        <li>Déléguez vos tâches du quotidien</li>
                        <li>Faites-vous aider par des jobeurs compétents et évalués</li>
                        <li>Gagnez du temps et économisez de l’argent</li>
                        <li>Simplifiez-vous la vie et profitez de votre temps libre</li>
                    </ul>
                    <a class="btn btn-outline-warning"  href="views/fournisseur/inscriptionFournisseur.php">Inscription</a>

            </div>
        </div>
    </div>
</div>
<?php include 'assert/include/footer.php' ?>
</body>
</html>
