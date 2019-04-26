<?php 
    require 'class/dataBase.php';
    require 'class/function.php';
    $db=DataBase::connect();
    $selectPlan=$db->prepare('SELECT * FROM plan');
    $selectPlan->execute(array());
    $resultPlan=$selectPlan->fetchAll();
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
    <!-- section plan  -->
    <section>
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
                        <img src="imagesToUpload/<?=$imagesPlan?>" alt="" width="90%" height="auto">
                    <div class="row ligne">
                        <div class="col-sm voir">
                            <a href="viewMaison.php?id=<?=$idPlan?>" class="">Voir les models de maisons </a>
                        </div>
                        <div class="col-sm agrandir">
                            <a href="#" class="">Agrandire le plan</a>
                        </div>
                    </div>
                </div>
                    <?php endforeach ?>
            </div>
         </section>
    </section>
</section>
<script src="js/plan.js"></script>
</body>
</html>