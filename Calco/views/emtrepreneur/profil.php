<?php 
session_start();
    require 'assert/class/dataBase.php';
    require 'assert/class/function.php';
    $db=DataBase::connect();
if(isset($_SESSION['userNum']))
{
     $bienvenue=true;
     $NumeroExist=$db->prepare('SELECT * FROM User WHERE Numero = ?');
     $NumeroExist->execute(array($_SESSION['userNum']));
     $resNumExit=$NumeroExist->fetchAll();
     // selection des plans
     $selectPlan=$db->prepare('SELECT * FROM plan');
     $selectPlan->execute(array());
     $resultPlan=$selectPlan->fetchAll();
}
else
{
    header('Location:index.php');
}
?>
<!-- TRAITEMENT DES INFORMATION EN PHP  -->
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
                    <img src="images/imagesUser/<?=$resNumExit[0]['image']?>" alt=""  width="130px" height="100px" class="rounded-circle">

                    <div style="font-size: 40px">
                        <a href=""><i class="fas fa-user-cog"></i></a>
                    </div>
                    <div class="seting" style="font-size: 25px">
                        <div class="row"> 
                            <div class="col-sm"><a href="../../index.php"><i class="fas fa-sign-out-alt"></i></a></div>
                            <div class="col-sm"><a href="#"><i class="fas fa-user-edit"></i></a></div>
                        </div>
                    </div>
                </div>
                <!--FAIRE L'INCLUSION JUSTE EN HAUT -->
                <div class="divLien">
                    <a  href="" class="btn btn-outline-success lien"><i class="far fa-home-lg-alt"></i>Ajouter au favoris</a>
                    <a  href="" class="btn btn-outline-primary lien">Contacter L'entrepreneur</a>
                    <a  href="" class="btn btn-outline-primary lien">Ajoutre un plan </a>
                    <a  href="" class="btn btn-outline-primary lien">Genere un devis </a>
                </div>
            </div>
            <!-- section de droite -->
            <div class="offset-md-3  col-md-8 ">
                <!--selection du type de plan -->
                <form action="post">
                    <div class="row selectePlan">
                        <div class="form-group col-md-4">
                            <select name="typePlan" id="typePlan" class="form-control select">
                                <option value="">Model de Plan</option>
                                    <?php 
                                        $type_plan = selectAll($db,'type_plan');
                                        foreach ($type_plan as $plan):
                                            $id =$plan['id'];
                                            $nom=$plan['Nom'];
                                        ?>
                                    <option value="<?= $id ?>"><?= $nom ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <h2><span class='nombrePlan'><?=sizeof($type_plan)?></span> plan disponibles </h2>
                        </div>
                    </div>
                </form>
                <!--selection du type de plan -->
                <!--selection du images des plan -->
                <section>
                    <div class="imagesPlan row">
                        <?php
                            foreach ($resultPlan as $plans) :
                                $idPlan=$plans['id'];
                                $imagesPlan=$plans['images'];
                                $description=$plans['description'];
                        ?>
                        <div class="col-md-6">
                            <h2> TITRE DU PLAN ...</h2>
                                <img src="images/imagesMaisons/<?=$imagesPlan?>" alt="" width="90%" height="auto">
                            <div class="row ligne">
                                <div class="col-sm voir">
                                    <a href="viewMaison.php?id=<?=$idPlan?>" class=""><i class="far fa-home-lg-alt"></i> Voir</a>
                                </div>
                                <div class="col-sm agrandir">
                                    <a href="#" class="">Agrandire le plan</a>
                                </div>
                            </div>
                        </div>
                            <?php endforeach ?>
                    </div>
                    </div>
                </div>
    </div>
    <!-- fin de la div principale -->
    <script src="js/plan.js"></script>

</body>
</html>