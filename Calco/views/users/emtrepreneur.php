<?php 
session_start();
    require '../../assert/class/dataBase.php';
    require '../../assert/class/function.php';
    $db=DataBase::connect();
if(isset($_SESSION['userNum']))
{
     if(isset($_GET['id_E']))
     {
      $id=$_GET['id_E'];
      $bienvenue=true;
       $NumeroExist=$db->prepare('SELECT * FROM User WHERE Numero = ?');
       $NumeroExist->execute(array($_SESSION['userNum']));
       $resNumExit=$NumeroExist->fetchAll();
       // selection des plans
       $selectPlan=$db->prepare('SELECT * FROM plan');
       $selectPlan->execute(array());
       $resultPlan=$selectPlan->fetchAll();
       
      //selection de l'utilisateur qui a publier le plan des maison

      $select_User=$db->prepare('SELECT * FROM user as u join plan as p on u.id = p.id_user WHERE p.id_user = ?');
      $select_User->execute(array($id));
      $resSelectUser=$select_User->fetchAll();
     
     }
     else
     {
        header('Location:user_profil.php');
     }
}
else
{
    header('Location:../../index.php');
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
    <link rel="stylesheet" href="../../css/profil.css">
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
                            <div class="col-sm">
                              <a href="../../index.php"><i class="fas fa-sign-out-alt"></i>
                              </a>
                            </div>
                            <div class="col-sm">
                              <a href="../message.php"><i class="fas fa-bell"></i><span style="color: red;font-size: 20px"></span><?=$resNumExit[0]['notif']?>
                              </a>
                            </div>
                            <div class="col-sm">
                              <a href="modif.php"><i class="fas fa-user-edit"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
              

                <!--FAIRE L'INCLUSION JUSTE EN HAUT -->
                <div class="divLien">
                    <a  href="" class="btn btn-outline-success lien"><i class="far fa-home-lg-alt"></i>Ajouter au favoris</a>
                    <a  href="" class="btn btn-outline-primary lien">Contacter L'entrepreneur</a>
                    <a  href="" class="btn btn-outline-primary lien">Genere un devis </a>
                </div>
            </div>
            <!-- section de droite -->
            <div class="offset-md-3  col-md-8 ">
                <div class="emtre">
                    <div class="row contenueEmtre">
                   
                        <div class="col-md-4 ">
                            <img src="../../images/imagesUser/<?=$resSelectUser[0]['image']?>" alt=""  width="150px" height="150px" class="rounded-circle">
                            <p><?=$resSelectUser[0]['Nom']?></p>
                            <div class="etoil" style="color: orange">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="diplomesEmtrepreneur">
                                <div class="row">
                                    <a class="col-sm btn btn-outline-primary"><i class="fas fa-graduation-cap"></i><?=$resSelectUser[0]['diplome']?></a>
                                    <a class="col-sm btn btn-outline-primary"><i class="fas fa-calendar-alt"> </i><?=$resSelectUser[0]['id']?> annees d'experiances</a>  
                                </div>
                                                            
                            </div>
                             <div style="margin: 20px;padding: 20px ;font-size:30px">
                                <i class="fas fa-city">  </i><?=$resSelectUser[0]['ville']?> <?=$resSelectUser[0]['Numero']?>
                            </div>
                             <div style="margin: 20px;padding: 20px ;font-size:30px">
                                <a href="" class="btn btn-outline-primary"><i class="fas fa-user-hard-hat"></i> mes chantiers</a>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="">
                        <a href="" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Envois ton messages ici <i class="far fa-paper-plane"></i> </a>
                    </div>
            </div>
    </div>
    <!-- fin de la div principale -->

    <!-- SECTION MODAL POUR LA SAISSE UN MESSAGES -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mercie de me laisser votre message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id="formMessage">
          <div class="spinner-grow wate" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="alert alert-danger alert-dismissible fade show ok" role="alert">
            <strong>Error ); !</strong>veillez saisire votre message !.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="form-group ">
                <input type="hidden" name="emmeteur" value="<?=$resNumExit[0]['id']?>">
                <input type="hidden" name="recepteur" value="<?=$id?>">
                <textarea name="message" placeholder="votre message ;)" rows="5" style="width: 100%" >
                </textarea>
            </div>
            
      </div>
      <div class="modal-footer">
        <input type="submit" name="sumbit" class="btn btn-outline-success " value="envoyer" id="sumbit">
<!--         <a href="" class="btn btn-outline-success " id="sumbit">Envoye <i class="far fa-paper-plane"></i></a>
 -->        </form>
        <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Annuler</button>
      </div>
    </div>
  </div>
</div>
</body>
<script src="../js/message.js"></script>
</html>
