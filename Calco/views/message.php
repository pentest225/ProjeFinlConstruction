<?php
session_start();
    require '../assert/class/dataBase.php';
    require '../assert/class/function.php';
    $db=DataBase::connect();
if(isset($_SESSION['userNum']))
{
     
   //selection des information de l'utilisateu;
   $NumeroExist=$db->prepare('SELECT * FROM User WHERE Numero = ?');
   $NumeroExist->execute(array($_SESSION['userNum']));
   $resNumExit=$NumeroExist->fetchAll();
   //selection de ses messages 
   $selectMessage=$db->prepare('SELECT u.id, u.nom ,u.image ,m.message ,m.date FROM user as u join message as m on u.id =m.id_emmeteur WHERE m.id_recepteur=?');
   $selectMessage->execute(array($resNumExit[0]['id']));
   $resSeleMesage=$selectMessage->fetchAll();


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
    <link rel="stylesheet" href="../css/profil.css">
    <title>Document</title>
    <style type="text/css">
      .messages
      {
        margin: 50px;
      }
      .message
      {
        padding: 5px;
        text-align: none;
        color: rgb(132, 170, 232);
        font-family:'Harrington';
      }
      .infoMessage{
        display: flex;
        justify-content: space-around;
      }
      .infoMessage h4
      {
        color: rgb(69, 141, 188);
        font-family: 'Harlow Solid';
      }
      .red
      {
        font-style: italic;
        color: #f4b642;
      }
    </style>
</head>
<body>
    <div class="principale">
        <div class="row">
            <div class="col-md-3 divLeft">
                <div class="divImage">
                    <img src="../images/imagesUser/<?=$resNumExit[0]['image']?>" alt=""  width="130px" height="100px" class="rounded-circle">

                    <div style="font-size: 40px">
                        <a href=""><i class="fas fa-user-cog"></i></a>
                    </div>
                    <div class="seting" style="font-size: 25px">
                        <div class="row"> 
                            <div class="col-sm">
                              <a href="../index.php"><i class="fas fa-sign-out-alt"></i>
                              </a>
                            </div>
                            <div class="col-sm">
                              <a href="message.php"><i class="fas fa-bell"></i><span style="color: red;font-size: 20px"></span><?=$resNumExit[0]['notif']?>
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
              <div class="row messages">
                <div class="col-md">
                  <?php
                      foreach ($resSeleMesage as $message):
                      $date =$message['date'];
                      $nom=$message['nom'];
                      $message=$message['message'];
                      // $user_image=$message['image'];
                      
                     ?>
                  <div class="row message">
                      <div class="col-sm-2">
<!--                         <img src="../images/imagesUser/<?=$user_image ?>" alt=""  width="60px" height="60px" class="rounded-circle">                    
 -->                      </div>
                      <div class="col-sm-8">
                        <div class="infoMessage">
                        <h4> <?=$nom ?> </h4>
                        <p>le :<small class="red"> <?=$date ?></small></p>
                        </div>
                        <?=$message ?>
                      </div>
                      <div class="row " style="height:40px">
                        <a href="" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#exampleModal" style="height:25px"><i class="far fa-paper-plane"></i> </a>
                        <a href="" class="btn btn-outline-danger btn-lg" data-toggle="modal" data-target="#exampleModal" style="height:25px"><i class="far fas fa-trash"></i> </a>
                  </div>
                  </div>
                <?php endforeach ?>

                </div>
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
                <input type="hidden" name="emmeteur" value="">
                <input type="hidden" name="recepteur" value="">
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
<script src="js/message.js"></script>
</html>
